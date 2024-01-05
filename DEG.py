import scanpy as sc
import seaborn as sns
import matplotlib.pyplot as plt
import gprofiler
from gseapy import barplot, dotplot
from anndata import AnnData
import pandas as pd
import numpy as np
import igraph as ig
import louvain
import pymysql

from sqlalchemy import create_engine
import pandas as pd

#----------------------- 使用 SQLAlchemy 創建一個數據庫引擎 ----------------------#

# engine = create_engine('mysql+pymysql://root:898026@localhost/dbfinal')

# 使用 pandas 從數據庫讀取數據
# try:
    # gem = pd.read_sql('SELECT * FROM kim_count_scrna_rmzero_log2', con=engine)
    # cell_type = pd.read_sql('SELECT * FROM kim_scrna_category_table', con=engine)
# except Exception as e:
    # print("數據庫讀取錯誤：", e)

# print(gem.head())
# print(cell_type.head())


# -------------------------------使用 pymysql ------------------------------------------ #

# 設定資料庫連接參數

db_connection = pymysql.connect(host='localhost', user='root', password='898026', database='dbfinal')

# 使用 pandas 讀取數據
gem = pd.read_sql('SELECT * FROM kim_fpkm_scrna_rmzero_log2_ori', con=db_connection)
cell_type = pd.read_sql('SELECT * FROM kim_scrna_category_table_ori', con=db_connection)

# 關閉資料庫連接
db_connection.close()

#--------------------------------------------------------------------------------------------


# gem = pd.read_csv("Kim_count_scRNA_rmZero_log2.txt",sep = "\t")
# cell_type = pd.read_csv("Kim_scRNA_category_table.txt",sep = "\t")
adata = AnnData(X = gem.drop(gem.columns[0], axis=1).transpose(), var=pd.DataFrame(index=gem.iloc[:,0]))
# adata.obs = pd.DataFrame(cell_type.iloc[:,1])


# Perform principal component analysis (PCA)
sc.pp.pca(adata, n_comps=50)

# Perform Louvain clustering
sc.pp.neighbors(adata, n_neighbors=10, n_pcs=50)
sc.tl.louvain(adata)

# Plot UMAP
sc.tl.umap(adata)
ax = sc.pl.umap(adata, color='louvain', show=False)

# save image
ax.figure.savefig('umap_plot.png', dpi=300)
plt.close(ax.figure)




# Step 5: Differential Expression Analysis

# Identify marker genes for each cluster
sc.tl.rank_genes_groups(adata, 'louvain', method='wilcoxon')
rankGene = sc.pl.rank_genes_groups(adata, n_genes=25, sharey=False, show = False)


# Show plots
# plt.show()

plt.savefig('rankGene.png', dpi=300) 
plt.close()  


#outputdf
result = adata.uns['rank_genes_groups']
groups = result['names'].dtype.names
df = pd.DataFrame(
{group + '_' + key[:1]: result[key][group]
for group in groups for key in ['names','scores','logfoldchanges','pvals','pvals_adj']})
df = df.iloc[0:25,]
df.to_csv('output_DEG.csv')


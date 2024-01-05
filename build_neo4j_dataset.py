# -*- coding: utf-8 -*-
from build_node_relation import DataToNeo4j
import pandas as pd

test_data = pd.read_excel(r"C:\Users\ddes2\Desktop\桌面\R\human_genes\genage_human_.xlsx", header = 0)
# 可以先閱讀文檔介紹 API 應用：http://py2neo.org/v4/index.html

def data_extraction():
    """節點數據抽取"""
    
    # 取出 Gene Symbol 到 list
    node_sym_key = []
    for i in range(0, len(test_data)):
        node_sym_key.append(test_data['symbol'][i])
    
    # 取出 name 到 list
    node_name_key = []
    for i in range(0, len(test_data)):
        node_name_key.append(test_data['name'][i])
    
    # 去除重複的名稱
    node_sym_key = list(set(node_sym_key))
    node_name_key = list(set(node_name_key))
    
    # value 抽出作 node
    node_list_value = []
    for i in range(0, len(test_data)):
        for n in range(1, len(test_data.columns)):
            node_list_value.append(test_data[test_data.columns[n]][i])
    
    # 去除重複的名詞
    node_list_value = list(set(node_list_value))
    
    # 將 list 中浮點及整數類轉換成 string
    #node_list_value = [str(i) for i in node_list_value]
    
    return node_sym_key, node_name_key, node_list_value


def relation_extraction():
    """關係數據抽取"""
    
    links_dict = {}
    sym_list = []
    why_list = []
    name_list = []
    
    for i in range(0, len(test_data)): #遍歷數據，採集三個欄位的數據
        why_list.append(test_data[test_data.columns[2]][i]) # relation
        name_list.append(test_data[test_data.columns[1]][i]) # name
        sym_list.append(test_data[test_data.columns[0]][i]) # symbol
        
    # 將數據中 int 類型轉換成 str
    # sym_list = [str(i) for i in sym_list]
    # why_list = [str(i) for i in why_list]
    # name_list = [str(i) for i in name_list]
    
    # 整合數據，將三個 list 整合成一個 dict
    links_dict['symbol'] = sym_list
    links_dict['why'] = why_list
    links_dict['name'] = name_list
    
    # 將數據轉換成 Dataframe
    df_data = pd.DataFrame(links_dict)
    print(df_data)
    return df_data

create_data = DataToNeo4j() # 調用外部 py 的子函數，建立連接，把圖數據庫先建好
create_data.create_node(data_extraction()[0], data_extraction()[1]) # 建立 sym/name 節點，利用函數的第0個、第1個返回
create_data.create_relation(relation_extraction()) # 建立關係，利用 relation_extraction 返回的 dataframe
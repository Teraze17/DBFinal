# -*- coding: utf-8 -*-
from py2neo import Node, Graph, Relationship, NodeMatcher
# 過程：1. 創建圖 2. 創建節點 3. 建立關係 4. 查找

class DataToNeo4j(object):
    """將 excel 中數據存入 neo4j"""
    
    def __init__(self) :
        """建立連接"""
        
        #link = Graph("http://localhost:7687", username = "neo4j", password="898026")
        link = Graph("bolt://localhost:7687", auth = ("neo4j", "shihhan898026"))
        self.graph = link
        # self.graph = NodeMatcher(link)
        
        # 定義 label
        self.sym = 'symbol'
        self.name = 'name'
        self.graph.delete_all() # 之前做的所有內容先刪掉
        self.matcher = NodeMatcher(link)
        
    def create_node(self, node_sym_key, node_name_key):
        """建立節點"""
        for name in node_sym_key:
            sym_node = Node(self.sym, name = name) # name 是這個節點的屬性
            self.graph.create(sym_node)
        for name in node_name_key:
            name_node = Node(self.name, name = name)
            self.graph.create(name_node)
            
    def create_relation(self, df_data):
        """建立關係"""
        
        m = 0
        for m in range(0, len(df_data)):
            try:
                print(list(self.matcher.match(self.sym).where("_.name=" + "'" + df_data['symbol'][m] + "'"))) # 打印關係裡面的 sym/name 節點，.where是匹配條件
                print(list(self.matcher.match(self.name).where("_.name=" + "'" + df_data['name'][m] + "'"))) # 這樣寫是為了匹配 dataframe 裡面的字符串
                rel = Relationship(self.matcher.match(self.sym).where("_.name=" + "'" + df_data['symbol'][m] + "'").first(),
                    df_data['why'][m], self.matcher.match(self.name).where("_.name=" + "'" + df_data['name'][m] + "'").first())
                
                self.graph.create(rel)
                
            except AttributeError as e:
                print(e, m)
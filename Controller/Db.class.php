<?php
	header("content-type:text/html;charset=utf-8");
	class Db{
		public $con;
		public $sql;
		public function __construct(){
			$this->db();
		}
		public function db(){
			$this->con=mysqli_connect("127.0.0.1","root","root");
			if (!$this->con) {
			die("连接数据库失败".mysql_error());
			}
			mysqli_select_db($this->con,"fruitday");
			mysqli_query($this->con,"set names  utf8");
		}
		//查询语句
		public function select(){
			$this->sql="select '{$fileds}'  from {$table}";
			$result=mysqli_query($this->con,$this->sql);
			while ($row=mysqli_fetch_row($result)) {
				$rows[]=$row;
			}
			return $rows;
		}
		//插入语句
		public function insert($table,$files,$newvalues){
			$this->sql="insert into {$table} ({$files}) values ({$newvalues})";
			if(mysqli_query($this->con,$this->sql)) {
				echo "数据插入成功！" ;
			}else{
			 echo "插入失败！";
			}
		}
		/*
		$table:表名
		$condition:条件
		*/
		public function delete($table,$condition){
			$this->sql="delete from {$table} where {$condition}";
			if(mysqli_query($this->con,$this->sql)) {
				echo "数据删除成功！" ;
			}else{
			 echo "删除失败！";
			}
		}
		/*
		$table:表名
		$values:值
		$condition:条件
		*/
		public function update($table,$values,$condition){

			$this->sql="update {$table} set {$values} where {$condition} ";
			if(mysqli_query($this->con,$this->sql)) {
				echo "数据更新成功！" ;
			}else{
			 echo "更新失败！";
			}
		}
	}
	$db=new Db();
	$res=$db->select() ;
	echo "<pre>";
	print_r($res);
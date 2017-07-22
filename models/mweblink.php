<?php
class Models_MWeblink extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	//liet ke danh sach du lieu
	function listdata($select = "",$where = "",$orderby = "",$limit = ""){
		if(isset($select) && $select != ""){
			$this->select($select);
		}else{
			$this->select("*");
		}
		if(isset($where) && $where != ""){
			$this->where($where);
		}
		
		$this->getdata(TBL_WEBLINK,$orderby,$limit);
		return $this->fetchall();
	}
	function getOneparent($where = ""){
		$sql ="select * from ".TBL_WEBLINK." where ".$where;
		$kq = mysql_query($sql);
		$row = mysql_fetch_assoc($kq);
		return $row;
	}
}
?>
<?php
class Models_MManufacturer extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	
	/*
	 * cap nhat sap xep thu tu (sort)
	 */
	function sortData($data){
		foreach($data as $key => $value){
			$this->where("Id = $key");
			$this->update(TBL_MANUFACTURER,"sort = $value");
		}
	}
	/*
	 * tic lock chu de
	 */
	function ticlockactive($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_MANUFACTURER,$data);	
	}
	
	/*
	 * them mot chu de
	 */
	function addManufacturer($data){
		$this->insert(TBL_MANUFACTURER,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	/*
	 * lay thong tin mot chu de
	 */
	function getOneManufacturer($id){
		$this->where("Id = $id");
		$this->getdata(TBL_MANUFACTURER);
		return $this->fetchone();
	}
	
	/*
	 * edit thong tin
	 */
	function editManufacturer($data,$id){
		$this->where("Id = $id");
		$this->update(TBL_MANUFACTURER,$data);
	}
	/*------------------------*/
	function listdata($where,$start,$numrow){
		if($where != ''){
			$this->where($where);
		}
	
		$this->getdata(TBL_MANUFACTURER,"sort ASC, Id DESC","$start,$numrow");
		return $this->fetchall();
	}
	/*----------------------*/	
	function countdata($where = ""){
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_MANUFACTURER);
		return $this->num_rows();
	}
	
	/*
	 * delete nhieu dong
	 */
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_MANUFACTURER,'Id = '.$item);
		}
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($id){
		$this->delete(TBL_MANUFACTURER,'Id = '.$id);
	}
	/*tic lock chu de*/
	function delFile($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_MANUFACTURER,$data);	
	}

}
?>
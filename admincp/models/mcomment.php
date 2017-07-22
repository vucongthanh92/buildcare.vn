<?php
class Models_MComment extends Project
{
	function __construct()
	{
		parent:: __construct();
	}
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata($where = "",$start,$numrow){
		if($where != "")
			$this->where($where);	
		$this->getdata(TBL_COMMENT,"Id desc","$start,$numrow");
		$row = $this->num_rows();
		return $this->fetchall();
	}
	
	/*
	 * tic lock mot tin
	 */
	function ticlockactive($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_COMMENT,$data);	
	}
	
	/*
	 * lay thong tin mot tin
	 */
	function getOneNew($id,$select = ""){
		if($select != "")
			$this->select($select);
		$this->where("Id = '$id'");
		$this->getdata(TBL_COMMENT);
		return $this->fetchone();
	}
	/*
	 * lay tong so dong
	 */
	function countdata($where = ""){
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_COMMENT);
		return $this->num_rows();
	}
	
	/*
	 * them mot tin
	 */
	function addNew($data){
		$this->insert(TBL_COMMENT,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	/*
	 * edit thong tin
	 */
	function editNew($data,$id){
		$this->where("Id = $id");
		$this->update(TBL_COMMENT,$data);
	}
	
	/*
	 * delete nhieu dong
	 */
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_COMMENT,'Id = '.$item);
		}
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($id){
		$this->delete(TBL_COMMENT,'Id = '.$id);
	}
}
?>
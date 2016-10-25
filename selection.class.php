<?php 
require_once($_SERVER["DOCUMENT_ROOT"].'/php/lib/PDOIGOWAPDB.class.php');
// Z:/igowap/php/lib/PDODB.class.php
class selection{
	public $catarr=array();// academic_type array
	public function __construct(){
		$this->db = PDODB::getCMS_DB();
		$this->catarr=array(
				1=>"商科类",
				2=>"理科类",
				3=>"工科类",
				4=>"文科类",
				5=>"艺术类",
				6=>"医学类",
				7=>"社会科学类",
				8=>"其他"
			);
	}
	public function getParameter($pName){
       $pValue = "";
       if( isset( $_POST[$pName] ) ){
         $pValue = $_POST[$pName];
       }else if( isset( $_GET[$pName] ) ){
         $pValue = $_GET[$pName];
       }
       // $pValue = iconv("utf-8","gb2312", trim($pValue) );
       return $pValue;
	}
	public function getTopRanks($ptype){//get top rank type list by academic type(ptype)
		$sql="select * from igowap_school_ranking_type where type_academic_type=?";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array($ptype));
		while( $result = $stmt->fetch() ){
		    $typelist['typeid'][]=$result['TYPE_ID'];
		    $typelist['typename'][]=$result['TYPE_NAME'];
		}    
		return $typelist;
	}
	public function getTopRankMajors($ranktype){ //get majors under top ranking type
	   $subtype=$this->getSubTypeByTopType($ranktype);
	   $majors=$this->getMajorsBySubType($subtype);
	   return $majors;
	}
	public function getSubTypeByTopType($toptype){// get sub types through given top type
	    $sql="select * from igowap_school_ranking_sub_type where rank_type_type_id=?";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array($toptype));
		while( $result = $stmt->fetch() ){
		    $subtype[]=$result['RANK_TYPE_ID'];
		}
		return $subtype;
	}
	public function getMajorsBySubType($subtype){// get major by sub type(an array of types)
		$in=implode(',', $subtype);//
		$sql="select * from igowap_school_major_vs_type where rank_type_id in($in)";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		$idlist=array();
		while( $result = $stmt->fetch() ){
		    $majors['typeid'][]=$result['RANK_TYPE_ID']; // sub type id
		    // then get major name by join with major table
		    $idlist[]=$result["MAJOR_ID"];
			$ids=implode(",",$idlist);
			$majors['name']=$this->getMajorNameById($ids);
		}
		return $majors;
	}
	public function getMajorNameById($majorId){ //single major_id or an array of major_ids
	    $sql="select * from igowap_school_major where major_id in($majorId)";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		while( $result = $stmt->fetch() ){
		    $majors[]=$result['MAJOR_NAME'];
		}
		return $majors;
	}
	public function getRankList($rankid,$key=''){
	   	$sql="select * from igowap_school_rankings where rank_type_id=?";
	   	if($key){
	   		$sql.=" and rank_school like '%$key%'";
	   	}
		// echo $sql;
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array($rankid));
		while( $result = $stmt->fetch() ){
		    $ranks[]=$result;
		}
		return $ranks;
	}
	public function getSubRankById($id){
	    $sql="select * from igowap_school_ranking_sub_type where rank_type_id=?";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array($id));
		while( $result = $stmt->fetch() ){
		    $rankname=$result['RANK_TYPE_NAME'];
		    $shortname=$result['RANK_SHORT_NAME'];
		}
		return array('rankname'=>$rankname,'shortname'=>$shortname);
	}
	public function getCountryByMajor($majorid){
	   	$sql="select * from igowap_school_major where major_id=?";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array($majorid));
		while( $result = $stmt->fetch() ){
		    $country=$result['MAJOR_COUNTRY'];
		}
		return $country;
	}
	public function getSchoolId($sname){//get school id with cms.t_schools
		$sql="select college_id from t_schools where s_name_cn=?";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array($sname));
		while( $result = $stmt->fetch() ){
		    $sid=$result['COLLEGE_ID'];
		}
		return $sid;
	}
	public function filterTopRankByCat($school,$cat){// get the single top rank, filter by cat and school
		$subtype=$this->getSubTypeBySchool($school);
		$toptype=$this->getTopTypeBySub($subtype);// top type ids
		$types=implode(',', $toptype);
		$sql="select type_name,type_id from igowap_school_ranking_type where type_id in($types) and type_academic_type=?";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array($cat));
		while( $result = $stmt->fetch() ){
		    $typename=$result['TYPE_NAME'];
		    $typeid=$result['TYPE_ID'];
		}
		return array("typeid"=>$typeid,"typename"=>$typename);
	}
	public function getTopTypeName($typeid){
	    $sql="select type_name from igowap_school_ranking_type where type_id=?";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array($typeid));
		while( $result = $stmt->fetch() ){
		    $typename=$result['TYPE_NAME'];
		}
		return $typename;
	}
	public function getCatBySchool($school){//get academic type that contains the specified school 
	   $subtype=$this->getSubTypeBySchool($school);// get all the sub types that contains the school
	   $toptype=$this->getTopTypeBySub($subtype);// get all top types
	   $catlist=$this->getCatByTop($toptype);// get acedemic type list
	   // var_dump($catlist);
	   return $catlist;
	}
	public function getSubTypeBySchool($school){// one or multiple sub types (id)
	   	$sql="select rank_type_id from igowap_school_rankings where rank_school=?";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array($school));
		while( $result = $stmt->fetch() ){
		    $typeid[]=$result['RANK_TYPE_ID'];
		}
		return $typeid;// an array of sub type ids
	}
	public function getTopTypeBySub($subtype){ // $subtype => an array of sub type ids ; return an array of top type ids
	    $types=implode(',', $subtype);
	    $sql="select distinct rank_type_type_id from igowap_school_ranking_sub_type where rank_type_id in($types)";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		while( $result = $stmt->fetch() ){
		    $typeid[]=$result['RANK_TYPE_TYPE_ID'];
		}
		return $typeid;// an array of top type ids
	}
	public function getCatByTop($toptype){// $toptype => an array of top type ids ;
	   	$types=implode(',', $toptype);
	    $sql="select distinct type_academic_type from igowap_school_ranking_type where type_id in($types)";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		while( $result = $stmt->fetch() ){
		    $catlist[]=$result['TYPE_ACADEMIC_TYPE'];
		}
		return $catlist;// an array of cat
	}
	public function getMajors($subids){
	    //subtype to major
		$ids=implode(',', $subids);
		$sql="select major_id from igowap_school_major_vs_type where rank_type_id in($ids)";// get major ids
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		while( $result = $stmt->fetch() ){
			$majorid[]=$result['MAJOR_ID'];
			$majorname[]=$this->getMajorNameById($result['MAJOR_ID']);
		}
		return array("id"=>$majorid,"name"=>$majorname);// an array of majors info
	}
	/*public function getRankInRankings($subids,$school){
	   	// get sub rank type via majorids
		$types=implode(',', $subids);
	    $sql="select rank_val from igowap_school_rankings where rank_type_id in($types) and rank_school=?";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array($school));
		while( $result = $stmt->fetch() ){
		    $rank[]=$result['RANK_VAL'];
		}
		return $rank;
	}*/
	public function getRankingsByTypeAndSchool($subid,$school){
	   	$sql="select rank_val from igowap_school_rankings where rank_type_id=? and rank_school=?";
		$stmt = $this->db->prepare($sql);
		// echo $sql.$subid."-".$school;
		$stmt->execute(array($subid,$school));
		while( $result = $stmt->fetch() ){
		    $rank=$result['RANK_VAL'];
		}
		return $rank;
	}
	public function getMajorsBySchool($school,$topid){
		$sql="select rank_type_id from igowap_school_rankings where rank_school=? and rank_type_id in(select rank_type_id from igowap_school_ranking_sub_type where rank_type_type_id=?)";//get sub ids
		$sql="select major_id from igowap_school_major_vs_type where rank_type_id in (".$sql.")";//get major ids
		$stmt = $this->db->prepare($sql);
		// echo $sql."-".$school."-".$topid;exit;
		$stmt->execute(array($school,$topid));
		while( $result = $stmt->fetch() ){
			$majorid[]=$result['MAJOR_ID'];
			$majorname[]=$this->getMajorNameById($result['MAJOR_ID']);
		}
		return array("id"=>$majorid,"name"=>$majorname);// an array of majors info
	}
	public function getRankingsByMajor($majorid,$sName){
	    $subid=$this->getSubTypeByMajor($majorid);
	    $sql="select rank_val from igowap_school_rankings where rank_type_id=? and rank_school=?";
		$stmt = $this->db->prepare($sql);
		// echo $sql;echo $subid;echo $sName;
		$stmt->execute(array($subid,$sName));
		while( $result = $stmt->fetch() ){
		    $rank=$result['RANK_VAL'];
		}
		return $rank;
	}
	public function getSubTypeByMajor($majorid){
	   	$sql="select rank_type_id from igowap_school_major_vs_type where major_id=?";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array($majorid));
		while( $result = $stmt->fetch() ){
		    $subid=$result['RANK_TYPE_ID'];
		}
		return $subid;
	}
}

 ?>
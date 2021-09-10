<?php 

class Mquery_model_v3 extends CI_Model
{
	public function addQuery($tableName, $addArr, $return_type="")
	{
		$result=array();
		$this->db->insert_batch($tableName, $addArr);
        $errNum=$this->db->error();
		$errorNo=$errNum["code"];
		if($errorNo!=0)
		{
			$error_message=$errNum["message"];
			$result["status"]=FALSE;
			$result["error"] = log_message('error', $error_message);
			$result["message"] = "Unable to insert :(";
			$result["userData"] = array();
			$result["lastID"] = "";
		}
		else
		{
			$result["status"] = TRUE;
			$result["error"] = array();
			$result["message"] = "Data inserted successfully :)";
			$result["userData"] = array();
			if(!empty($return_type))
			{
				$return_id=$this->db->insert_id(); 
			}
			else
			{
				$return_id=array();
			}
			$result["lastID"] = $return_id;
		}
		return $result;
	}

    public function addLogQuery($insertLogArr, $return_type="")
    {
		$result=array();
        $this->db->table("log_tbl");
        $this->db->insert("log_tbl",$insertLogArr);

        $errNum=$this->db->error();
		$errorNo=$errNum["code"];

        if ($errorNo!=0)
        {
			$error_message=$errNum["message"];
			$result["status"]=FALSE;
			$result["error"] = log_message('error', $error_message);
            $result["message"]="Unable to insert :(";
            $result["userData"]=array();
            $result["lastID"]="";
        }
        else
        {
            $result["status"]=TRUE;
            $result["error"]=array();
            $result["message"]="Data inserted successfully :)";
            $result["userData"]=array();
			if(!empty($return_type))
			{
				$return_id=$this->db->insert_id(); 
			}
			else
			{
				$return_id=array();
			}
            $result["lastID"]=$return_id();
        }

        return $result;
    }

	public function updateBatchQuery($tableName="", $updateArr=array(), $updateKey="", $whereArr=array(), $likeCondtnArr=array(), $whereInArray=array())
	{
		$result=array();
		$this->db->update_batch($tableName, $updateArr, $updateKey);
		
        if(!empty($whereArr))
        {
            foreach($whereArr AS $w_key=>$w_val)
            {
                $this->db->where($w_key, $w_val);
            }
        }

        if(!empty($likeCondtnArr))
        {
            foreach($likeCondtnArr AS $l_key=>$l_val)
            {
                $this->db->like($l_key, $l_val);
            }
        }

        if(!empty($whereInArray))
        {
            foreach($whereInArray AS $wh_key=>$wh_val)
            {
                $this->db->where_in($wh_key, $wh_val);
            }
        }
		if(!empty($whereArr))
		{
			foreach($whereArr AS $wh_key => $wh_val)
			{			
				$this->db->where($wh_key, $wh_val);			
			}
		}
		$errNum=$this->db->error();
		$errorNo=$errNum["code"];
		if($errorNo!=0)
		{
			$error_message=$errNum["message"];
			$result["status"]=FALSE;
			$result["error"] = log_message('error', $error_message);
			$result["message"] = "Unable to update :(";
			$result["userData"] = array();
		}
		else
		{
			$result["status"] = TRUE;
			$result["error"] = array();
			$result["message"] = "Data updated successfully :)";
			$result["userData"] = array();
		}
		return $result;
	}
    
    public function updateDataQuery($tableName="", $updateArr=array(), $whereArr=array(), $likeCondtnArr=array(), $whereInArray=array(), $updateKey="")
    {
		$result=array();

        $this->db->update_batch($tableName, $updateArr, $updateKey);

        if(!empty($whereArr))
        {
            foreach($whereArr AS $w_key=>$w_val)
            {
				$this->db->where($w_key, $w_val);
            }
        }

        if(!empty($likeCondtnArr))
        {
            foreach($likeCondtnArr AS $l_key=>$l_val)
            {
				$this->db->like($l_key, $l_val);
            }
        }

        if(!empty($whereInArray))
        {
            foreach($whereInArray AS $wh_key=>$wh_val)
            {
				$this->db->where_in($wh_key, $wh_val);
            }
        }
		$errNum=$this->db->error();
		$errorNo=$errNum["code"];
        if($errorNo!=0)
        {
			$error_message=$errNum["message"];
			$result["status"]=FALSE;
			$result["error"] = log_message('error', $error_message);
            $result["message"] = "Unable to update :(";
            $result["userData"] = array();
        }
        else
        {
            $result["status"] = TRUE;
            $result["error"] = array();
            $result["message"] = "Data updated successfully :)";
            $result["userData"] = array();
        }

        return $result;
    }
	
	public function deleteQuery($tableName, $whereArr=array())
	{
		$result=array();
		if(!empty($whereArr))
		{
			foreach($whereArr AS $wh_key => $wh_val)
			{			
				$this->db->where($wh_key, $wh_val);			
			}
		}
		$this->db->delete($tableName);
		$errNum=$this->db->error();
		$errorNo=$errNum["code"];
		if($errorNo!=0)
		{
			$error_message=$errNum["message"];
			$result["status"]=FALSE;
			$result["error"] = log_message('error', $error_message);
			$result["message"] = "Error Occured :(";
			$result["userData"] = array();
		}
		else
		{
			$result["status"] = TRUE;
			$result["error"] = array();
			$result["message"] = "Data is Deleted successfully :)";
			$result["userData"] = array();
		}
		return $result;
	}
	 
	public function getListRecordsQuery($tableName="", $colNames="", $whereArr=array(), $whereInArray=array(), $customWhereArray=array(), $orWhereArray=array(), $orWhereDataArr=array(),$likeCondtnArr=array(), $joinArr=array(), $orderByArr=array(), $groupByArr=array(), $singleRow=FALSE,$colActive=TRUE,$paginationArr="")
	{
		$result=array();
		$this->db->select($colNames, $colActive);
		$this->db->from($tableName);
		
		if(!empty($joinArr))
		{
            foreach($joinArr AS $eachJoin)
            {
                $joinTable=$eachJoin["tbl"];
                $joinCondtn=$eachJoin["condtn"];
                $joinType=$eachJoin["type"];
                $this->db->join($joinTable, $joinCondtn, $joinType);
            }
		}	
		if(!empty($whereArr))
		{
			foreach($whereArr AS $w_key => $w_val)
			{
				$this->db->where($w_key, $w_val);			
			}
		}		
		if(!empty($whereInArray))
		{
			foreach($whereInArray AS $wi_key => $wi_val)
			{			
				$this->db->where_in($wi_key, $wi_val);			
			}
		}
        if(!empty($customWhereArray))
        {
            foreach($customWhereArray AS $cust_wh_val)
            {
                $this->db->where($cust_wh_val);
            }
        }	
		if(!empty($orWhereArray))
		{
			foreach($orWhereArray AS $cust_wh_val)
			{
				$this->db->where($cust_wh_val);			
			}
		}
        if(!empty($orWhereDataArr))
        {
            foreach($orWhereDataArr AS $or_wh_val)
            {
                $this->db->orWhere($or_wh_val);
            }
        }			
		if(!empty($likeCondtnArr))
		{
			foreach($likeCondtnArr AS $l_key => $l_val)
			{			
				$this->db->like($l_key, $l_val);			
			}
		}
		if(!empty($orderByArr))
		{
			foreach($orderByArr AS $o_key => $o_val)
			{			
				$this->db->order_by($o_key, $o_val);			
			}
		}		
		if(!empty($groupByArr))
		{
			foreach($groupByArr AS $gbarray)
			{			
				$this->db->group_by($gbarray);			
			}
		}
		if(!empty($paginationArr))
		{
			$pageId=$paginationArr["pageNo"];
			if($pageId=="" || $pageId==0)
				$pageId=1;
			$pageLimit_start=$paginationArr["pageaLimit"];
			$offsetLimit_end=($pageId-1)*$paginationArr["pageaLimit"];
		}
		else
		{
			$pageId=1;
			$pageLimit_start=FALSE;
			$offsetLimit_end=0;
		}		
		$query=$this->db->get();
		
		$errNum=$this->db->error();
		$errorNo=$errNum["code"];
		if($errorNo!=0)
		{	
			$error_message=$errNum["message"];
			$result["status"]=FALSE;
			$result["error"] = log_message('error', $error_message);	
			//~ $result["message"]="Error Occured :(";
			$result["message"]=$result["error"];
			$result["userData"] = array();
		}
		else
		{
			$result["status"] = TRUE;
			$result["error"] = array();
			$result["message"] = "Query run successfully :)";
			if($singleRow)
				$result["userData"] =  $query->row_array();
			else
				$result["userData"] =  $query->result_array();
		}
		//~ print_r($result);
		return $result;
	}
	
	public function getListRecordsPaginationQuery($tableName, $colNames, $whereArr=array(), $whereInArray=array(), $customWhereArray=array(),  $orWhereArray=array(), $orWhereDataArr=array(), $likeCondtnArr=array(), $joinArr=array(), $orderByArr=array(), $groupByArr=array(), $singleRow=FALSE, $colActive=TRUE,$countArr="", $paginationArr="",  $offsetLimitBoolean=FALSE, $csvBoolean=FALSE)
	{
		$result=array();
		if(!empty($countArr))
			$this->db->select("COUNT(".$countArr["primary_key"].") AS ".$countArr["count_alias"], $colActive);
		else
			$this->db->select($colNames, $colActive);
		$this->db->from($tableName);
		
		if(!empty($joinArr))
		{
            foreach($joinArr AS $eachJoin)
            {
                $joinTable=$eachJoin["tbl"];
                $joinCondtn=$eachJoin["condtn"];
                $joinType=$eachJoin["type"];
                $this->db->join($joinTable, $joinCondtn, $joinType);
            }
		}
		if(!empty($whereArr))
		{
			foreach($whereArr AS $wh_key => $wh_val)
			{			
				$this->db->where($wh_key, $wh_val);			
			}
		}
        if(!empty($likeCondtnArr))
        {
            foreach($likeCondtnArr AS $l_key=>$l_val)
            {
                $this->db->like($l_key, $l_val);
            }
        }
		if(!empty($whereInArray))
		{
			foreach($whereInArray AS $whi_key => $whi_val)
			{			
				$this->db->where_in($whi_key, $whi_val);			
			}
		}
        if(!empty($orWhereArray))
        {
            foreach($orWhereArray AS $or_w_key=>$or_w_val)
            {
                $this->db->orWhere($or_w_key, $or_w_val);
            }
        }
        if(!empty($orWhereDataArr))
        {
            foreach($orWhereDataArr AS $or_wh_val)
            {
                $this->db->orWhere($or_wh_val);
            }
        }
		if(!empty($orderByArr))
		{
			foreach($orderByArr AS $orderBy_key => $orderBy_val)
			{			
				$this->db->order_by($orderBy_key, $orderBy_val);			
			}
		}
		if(!empty($groupByArr))
		{
			foreach($groupByArr AS $gba)
			{			
				$this->db->group_by($gba);			
			}
		}
		if(!empty($paginationArr))
		{
			$pageId=$paginationArr["pageNo"];
			if($pageId=="" || $pageId==0)
				$pageId=1;
			$pageLimit_start=$paginationArr["pageLimit"];
			$offsetLimit_end=($pageId-1)*$paginationArr["pageLimit"];
		}
		else
		{
			$pageId=1;
			$pageLimit_start=FALSE;
			$offsetLimit_end=0;
		}
				
		if(empty($countArr) && !$csvBoolean)
		{
			if($pageLimit_start)
				$this->db->limit($pageLimit_start, $offsetLimit_end);
		}
		
		$query=$this->db->get();
		
		$errNum=$this->db->error();
		$errorNo=$errNum["code"];
		if($errorNo!=0)
		{	
			$error_message=$errNum["message"];
			$result["status"]=FALSE;
			$result["error"] = log_message('error', $error_message);
			$result["message"]="Error Occured :(";
			$result["userData"] = array();
		}
		else
		{
			$result["status"] = TRUE;
			$result["error"] = array();
			$result["message"] = "Query run successfully :)";
      
			if(empty($countArr))
			{
				if($singleRow)
					$result["userData"] =  $query->row_array();
				else
					$result["userData"] =  $query->result_array();
			}
			else
			{
				$resultIncrementer=0;
				$result =  $query->row_array();
				if(!empty($result))
				{
					return $result[$countArr["count_alias"]];
				}
				else
				{
					return $resultIncrementer;
				}
			}
		}
		return $result;
	}

	public function getNotWhereinListRecordsQuery($tableName="", $colNames="", $whereArr=array(), $whereInArray=array(), $whereNotInArray=array(), $customWhereArray=array(), $orWhereArray=array(), $orWhereDataArr=array(),$likeCondtnArr=array(), $joinArr=array(), $orderByArr=array(), $groupByArr=array(), $singleRow=FALSE,$colActive=TRUE,$paginationArr="")
	{
		$result=array();
		$this->db->select($colNames, $colActive);
		$this->db->from($tableName);
		
		if(!empty($joinArr))
		{
            foreach($joinArr AS $eachJoin)
            {
                $joinTable=$eachJoin["tbl"];
                $joinCondtn=$eachJoin["condtn"];
                $joinType=$eachJoin["type"];
                $this->db->join($joinTable, $joinCondtn, $joinType);
            }
		}	
		if(!empty($whereArr))
		{
			foreach($whereArr AS $w_key => $w_val)
			{
				$this->db->where($w_key, $w_val);			
			}
		}		
		if(!empty($whereInArray))
		{
			foreach($whereInArray AS $wi_key => $wi_val)
			{			
				$this->db->where_in($wi_key, $wi_val);			
			}
		}
		if(!empty($whereNotInArray))
		{
			foreach($whereNotInArray AS $wi_key => $wi_val)
			{			
				$this->db->where_not_in($wi_key, $wi_val);			
			}
		}
        if(!empty($customWhereArray))
        {
            foreach($customWhereArray AS $cust_wh_val)
            {
                $this->db->where($cust_wh_val);
            }
        }	
		if(!empty($orWhereArray))
		{
			foreach($orWhereArray AS $cust_wh_val)
			{
				$this->db->where($cust_wh_val);			
			}
		}
        if(!empty($orWhereDataArr))
        {
            foreach($orWhereDataArr AS $or_wh_val)
            {
                $this->db->orWhere($or_wh_val);
            }
        }			
		if(!empty($likeCondtnArr))
		{
			foreach($likeCondtnArr AS $l_key => $l_val)
			{			
				$this->db->like($l_key, $l_val);			
			}
		}
		if(!empty($orderByArr))
		{
			foreach($orderByArr AS $o_key => $o_val)
			{			
				$this->db->order_by($o_key, $o_val);			
			}
		}		
		if(!empty($groupByArr))
		{
			foreach($groupByArr AS $gbarray)
			{			
				$this->db->group_by($gbarray);			
			}
		}
		if(!empty($paginationArr))
		{
			$pageId=$paginationArr["pageNo"];
			if($pageId=="" || $pageId==0)
				$pageId=1;
			$pageLimit_start=$paginationArr["pageaLimit"];
			$offsetLimit_end=($pageId-1)*$paginationArr["pageaLimit"];
		}
		else
		{
			$pageId=1;
			$pageLimit_start=FALSE;
			$offsetLimit_end=0;
		}		
		$query=$this->db->get();
		
		$errNum=$this->db->error();
		$errorNo=$errNum["code"];
		if($errorNo!=0)
		{	
			$error_message=$errNum["message"];
			$result["status"]=FALSE;
			$result["error"] = log_message('error', $error_message);	
			//~ $result["message"]="Error Occured :(";
			$result["message"]=$result["error"];
			$result["userData"] = array();
		}
		else
		{
			$result["status"] = TRUE;
			$result["error"] = array();
			$result["message"] = "Query run successfully :)";
			if($singleRow)
				$result["userData"] =  $query->row_array();
			else
				$result["userData"] =  $query->result_array();
		}
		//~ print_r($result);
		return $result;
	}
	
	

}
?>

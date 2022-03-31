function ApprovedCommentsAccordingToPost($PostId){
     <!-- global $ConnectingDB; -->
     $sqlApprove ="SELECT COUNT(*) FROM comments WHERE post_id='$PostId' AND status='ON'";
     $stmtApprove= $ConnectingDB->query($sqlApprove);
     $RowsTotal=$stmtApprove->fetch();
     $Total = array_shift($RowsTotal);
     return $Total;
}

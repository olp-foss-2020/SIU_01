<?php

/**
 * @Project NUKEVIET 3.0
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 VINADES.,JSC. All rights reserved
 * @Createdate 7-17-2010 14:43
 */

if ( ! defined( 'NV_IS_OCHU_ADMIN' ) )
{
    die( 'Stop!!!' );
}

if ( defined( 'NV_EDITOR' ) )
{
    require_once ( NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php' );
}
//khoi tao gia tri
$contents = "";
$error = "";
$rowcontent['title'] =  "";
$rowcontent['content'] =  "";
$rowcontent['key'] =  "";
$rowcontent['quession'] =  "";

// lay du lieu
$id = $nv_Request->get_int( 'id', 'get,post', 0 );

if ( $id == 0 )
{
    $page_title = $lang_module['add'];
}
else
{
    $page_title = $lang_module['edit'];
	$sql = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "` WHERE `id` = ".$id."";
	$resuilt = $db->sql_query( $sql );
	$row = $db->sql_fetchrow( $resuilt );
	$rowcontent['title'] = $row['title'];
	$rowcontent['content'] = $row['content'];
	$rowcontent['key'] = $row['key'];
	$rowcontent['quession'] = $row['quession'];

}

//sua cau hoi
if ( $nv_Request->get_int( 'edit', 'post', 0 ) == 1 )
{
	$rowcontent['title'] = filter_text_input( 'title', 'post', '' );
	$rowcontent['content'] = $nv_Request->get_string( 'content', 'post', '' );
	$rowcontent['key'] = $nv_Request->get_string( 'key', 'post', '' );
	$rowcontent['quession'] = $nv_Request->get_string( 'quession', 'post', '' );
	foreach ( $rowcontent as $key => $data  )
	{	
		$query = mysql_query("UPDATE `" . NV_PREFIXLANG . "_" . $module_data . "` SET `".$key."` = " . $db->dbescape( $data ) . " WHERE `id` =" . $id . "");
	}
	if ( $query ) 
	{
		Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name.""); die();
	}
	else
	{
		$error = $lang_module['error_save'];
	}
}

// them cau hoi
if ( $nv_Request->get_int( 'add', 'post', 0 ) == 1 )
{	
	
	// lay theo post
	$rowcontent['title'] = filter_text_input( 'title', 'post', '' );
	$rowcontent['content'] = $nv_Request->get_string( 'content', 'post', '' );
	$rowcontent['key'] = $nv_Request->get_string( 'key', 'post', '' );
	$rowcontent['quession'] = $nv_Request->get_string( 'quession', 'post', '' );
	
	if ( $rowcontent['title'] == '' )
	{
		$error = $lang_module['error_full_title'];
	} 
	elseif ( $rowcontent['content'] == '' )
	{
		$error = $lang_module['error_full_content'];
	}
	elseif ( $rowcontent['key'] == '' )
	{
		$error = $lang_module['error_full_key'];
	}
	elseif ( $rowcontent['quession'] == '' )
	{
		$error = $lang_module['error_full_quession'];
	}
	else
	{
		$query = "INSERT INTO `" . NV_PREFIXLANG . "_" . $module_data . "` 
		(
			`id`, `title`, `content`, `key`, `quession`
		) 
		VALUES 
		( 
			NULL, 
			" . $db->dbescape( $rowcontent['title'] ) . ", 
			" . $db->dbescape( $rowcontent['content'] ) . ", 
			" . $db->dbescape( $rowcontent['key'] ) . " ,
			" . $db->dbescape( $rowcontent['quession'] ) . "
		)
		"; 
		if ( $db->sql_query_insert_id( $query ) ) 
		{ 
			$db->sql_freeresult();
			Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name.""); die();
		} 
		else 
		{ 
			$error = $lang_module['error_save']; 
		} 

	}

}
if($error)
{
	$contents .= "<div class=\"quote\" style=\"width: 780px;\">\n
					<blockquote class=\"error\">
						<span>".$error."</span>
					</blockquote>
				</div>\n
				<div class=\"clear\">
				</div>";
}

$contents .="
<form method=\"post\" name=\"add_pic\">
	<table class=\"tab1\">
		<thead>
			<tr>
				<td colspan=\"2\">
					".$lang_module['ques']."
				</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style=\"width: 150px; background: #eee;\">
					".$lang_module['title']."
				</td>
				<td style=\"background: #eee;\">
					<input name=\"title\" style=\"width: 470px;\" value=\"".$rowcontent['title']."\" type=\"text\">
				</td>
			</tr>
			<tr>
				<td colspan=\"2\">
					<strong>".$lang_module['content']."</strong><br /><br />
					<strong>".$lang_module['atten']."</strong>: ".$lang_module['info1']."
				</td>
			</tr>
			<tr>
				<td colspan=\"2\">";
					$contents .= "<textarea style=\"width: 810px\" name=\"content\" id=\"content\" cols=\"20\" rows=\"15\">".$rowcontent['content']."</textarea>\n";
				$contents .="
				</td>
			</tr>
			<tr>
				<td colspan=\"2\"><strong>".$lang_module['key']."</strong><br /><br />
					<strong>".$lang_module['atten']."</strong>: ".$lang_module['info2']."
				</td>
			</tr>
			
			<tr>
				<td colspan=\"2\">";
					$contents .= "<textarea style=\"width: 810px\" name=\"key\" id=\"key\" cols=\"20\" rows=\"15\">".$rowcontent['key']."</textarea>\n";
				$contents .="
				</td>
			</tr>
			<tr>
				<td colspan=\"2\"><strong>".$lang_module['goiy']."</strong><br /><br />
				<strong>".$lang_module['atten']."</strong>: ".$lang_module['info3']."
			</td>
			</tr>
			
			<tr>
				<td colspan=\"2\">";
					$contents .= "<textarea style=\"width: 810px\" name=\"quession\" id=\"quession\" cols=\"20\" rows=\"15\">".$rowcontent['quession']."</textarea>\n";
				$contents .="
				</td>
			</tr>
			
			<tr>
				<td colspan=\"2\" align=\"center\" style=\"background: #eee;\">\n
					<input name=\"confirm\" value=\"".$lang_module['save']."\" type=\"submit\">\n";
					if ( $id == 0 ) 
						$contents .="<input type=\"hidden\" name=\"add\" id=\"add\" value=\"1\">\n";
					else
						$contents .="<input type=\"hidden\" name=\"edit\" id=\"edit\" value=\"1\">\n";
                    $contents .="<span name=\"notice\" style=\"float: right; padding-right: 50px; color: red; font-weight: bold;\"></span>\n
				</td>\n
			</tr>\n
		</tbody>\n
	</table>\n
</form>\n";

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_admin_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );
?>
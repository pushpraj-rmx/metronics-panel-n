<?php 

CREATE ENTRY 
Move this code to `add-something.php` and execute from there, if doesnt work from here

if (isset($_POST['add_slider'])) {

	$blog_title = $_POST['blog_title'];
	$blog_content = $_POST['blog_content'];
	$main_page_desc = $_POST['main_page_desc'];
	$blog_img = 'blog_img' . rand(0, 1000) . '_' . $_FILES['blog_img']['name'];
	$is_active = ($_POST['is_active'] != '' ? 1 : 2);

	$query = mysqli_query($conn, "insert into blog
    	                                             SET blog_title='$blog_title',
                                                         blog_content='$blog_content',
														 main_page_desc='$main_page_desc',
														 blog_img='$blog_img',
                                                         is_active='$is_active'");

	if ($query) {
		move_uploaded_file($_FILES['blog_img']['tmp_name'], 'images/blog-image/' . $blog_img . '');
		header('Location:manage-blogs.php');
	}
}

# UPDATE ENTRY 

$edit_id = $_GET['edit_rec'];

if(isset($_GET['edit_rec'])) {
	echo 'set';
	
}

if (isset($_POST['edit_entry'])) {

	$blog_title = $_POST['blog_title'];
	$blog_content = $_POST['blog_content'];
	$main_page_desc = $_POST['main_page_desc'];
	$blog_img = 'blog_img' . rand(0, 1000) . '_' . $_FILES['blog_img']['name'];
	$is_active = ($_POST['is_active'] != '' ? 1 : 2);

	if (!empty($_FILES['blog_img']['name'])) {
		$blog_img = 'img_' . rand(0, 1000) . '_' . $_FILES['blog_img']['name'];
	} else {
		$blog_img = $_POST['blog_img_hidden'];
	}



	$query = mysqli_query($conn, "update t_test
    	                                    	SET blog_title='$blog_title',
												blog_content='$blog_content',
												main_page_desc='$main_page_desc',
												blog_img='$blog_img',
    	                                    	is_active=$is_active where id=$edit_id");

	if ($query) {
		if (!empty($_FILES['blog_img']['name'])) {
			move_uploaded_file($_FILES['blog_img']['tmp_name'], 'images/blog-image/' . $blog_img . '');
			unlink('images/blog-image/' . $_POST['blog_img_hidden']);
		}
		header('Location:manage-blogs.php');
	}
}
$details = mysqli_fetch_array(mysqli_query($conn, "select * from t_test where id=$edit_id"));

?>
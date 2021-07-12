<?php

include_once '../phpheader.php';

if(isset($_GET['storageid'])) {
  $sql = "DELETE FROM storage_yard WHERE Storage_id = '" . $_GET['storageid'] . "'";
  setData($sql);
  header('location: ../index.php');
} elseif (isset($_GET['substorageid'])) {
  $sql = "DELETE FROM substorage_yard WHERE Substorage_id = '" . $_GET['substorageid'] ."'";
  setData($sql);
  header('location: ../index.php');
} elseif (isset($_GET['substoragefixedid'])) {
  $sql = "DELETE FROM substorage_yard_fixed WHERE Substorage_fixed_id = '" . $_GET['substoragefixedid'] ."'";
  setData($sql);
  header('location: ../index.php');
} elseif (isset($_GET['substoragemobileid'])) {
  $sql = "DELETE FROM substorage_yard_mobile WHERE Substorage_mobile_id = '" . $_GET['substoragemobileid'] ."'";
  setData($sql);
  header('location: ../index.php');
} elseif (isset($_GET['article_group_id'])) {
  $sql = "DELETE FROM articel_group WHERE Articel_group_id = '" . $_GET['Articel_group_id'] ."'";
  setData($sql);
  header('location: ../index.php');
} elseif (isset($_GET['articleid'])) {
  $sql = "DELETE FROM articel WHERE Articel_id = '" . $_GET['articleid'] ."'";
  setData($sql);
  header('location: ../index.php');
}

<?php
class registerApi
{
  public function index()
  {
      $result = Auth::registerUser();
      echo json_encode($result);
  }
}

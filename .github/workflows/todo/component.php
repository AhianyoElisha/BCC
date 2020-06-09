<?php
function addToDo()
{
  $addItem = "
  <li class=\"items\" id=\"items\">
      <i class=\"fa fa-circle-thin fa-2x co\" job=\"complete\" id=\"0\" aria-hidden=\"true\"></i>
      <p class=\"text\">Drink Coffee</p>
      <i class=\"fa fa-trash-o fa-2x\" job=\"delete\" data-toggle=\"modal\" data-target=\"#deleteModal\" id=\"0\"></i>
      <div id=\"0\" class=\"title\" onclick=\"f()\">&#8942;
      <div class=\"arrow\" id=\"0\"></div>
      </div>
      <div class=\"dropdown\" >
          <p class=\"menudrop\" onclick=\"f()\" data-toggle=\"modal\" data-target=\"#readModal\">Detail <i class=\"fa fa-info-circle\" aria-hidden=\"true\"></i></p>
          <p class=\"menudrop\" onclick=\"f()\" data-toggle=\"modal\" data-target=\"#updateModal\">Update <i class=\"fa fa-edit co\"aria-hidden=\"true\"></i></p>
          <p class=\"menudrop\" onclick=\"f()\" data-toggle=\"modal\" data-target=\"#deleteModal\">Delete <i class=\"fa fa-trash co\" aria-hidden=\"true\"></i></span></p>
      </div>
  </li>

  ";
  echo $addItem;
}

<?php

$page_title = "Todo List";

include "partials/head.inc.php";
include "partials/nav.inc.php";
?>

<h1>Todo List</h1>
<form action="/todo/add" method="post">
    <input type="text" placeholder="Enter task" name="description" id="description">
</form>

<form id="todo-form" action="/todo/update" method="post">
    <ul id="todo">
        <?php foreach ($results as $row): ?>
            <?php if($row->completed): ?>
                <li><input type="checkbox" data-completed="<?= $row->completed ?>" checked value="<?= $row->id ?>"><s><?= $row->description ?></s></li>
            <?php else: ?>
                <li><input type="checkbox" data-completed="<?= $row->completed ?>" value="<?= $row->id ?>"><?= $row->description ?></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</form>

<script>
    document.getElementById("todo").addEventListener("click", function(e) {
       if (e.target.nodeName === "INPUT") {
           var completedVal = document.createElement("input"),
                idVal = document.createElement("input");
           completedVal.type = idVal.type = "hidden";

           completedVal.name = "completed";
           completedVal.value = e.target.getAttribute("data-completed");

           idVal.name = "id";
           idVal.value = e.target.value;

           e.target.parentNode.insertBefore(completedVal, e.target.nextSibling);
           e.target.parentNode.insertBefore(idVal, e.target.nextSibling);
           document.getElementById("todo-form").submit();
       }
    });
</script>

<?php
require "partials/foot.inc.php";
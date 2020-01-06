

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                   <span class="glyphicon glyphicon-th-list"> Genre </span>
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">

                <ul class="list-group">
                    <?php
                    $g=$genre->getAllCategory();

                    foreach ($g as $gen):
                        ?>
                        <li class="list-group-item">

                            <a href="index.php?cat=<?php echo $gen['id']?>"> <?php echo $gen['category_name']?> </a>

                        </li>

                    <?php
                    endforeach;
                    ?>


                </ul>
            </div>
        </div>
    </div>

</div>
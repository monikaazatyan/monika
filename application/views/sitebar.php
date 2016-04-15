<ul class="nav navbar-nav side-nav">
    <li class="active">
        <a href="new_articles"></i> Add a new article</a>
    </li>
    <li>
        <a href="javascript:;" data-toggle="collapse" data-target="#demo"></i> My articles <i class="fa fa-fw fa-caret-down"></i></a>
        <ul id="demo" class="collapse">
            <?php foreach ($articles as $art): ?>

                <li id="<?=$art->id?>">
                    <a href="#"><?=$art->title?></a>
                </li>

            <?php endforeach; ?>

        </ul>
    </li>

</ul>
</div>
</nav>
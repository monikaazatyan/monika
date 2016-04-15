<div id="page-wrapper">
    <div class="container-fluid">
        <h1>Add a new articles...</h1>
        <form action="new_articles" method="post" class="add_articles" enctype="multipart/form-data">
            <input type="text" placeholder="title" name="title" class="art_title" value="<?=set_value('user_name')?>">
            <?=form_error("title")?>
            <textarea name="description" placeholder="description" class="art_description" value="<?=set_value('user_name')?>"></textarea>
            <?=form_error("description")?>
            <input type="file" name="image" accept="image/*" class="art_image">
            <?=form_error("image")?>
            <input type="submit" value="Add" name="add_articles" class="add_art" >
        </form>
    </div>
</div>

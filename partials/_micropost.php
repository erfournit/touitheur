<article class="media status-media" id="micropost<?=$microposts->m_id?>">
    <div class="pull-left">
        <img src="<?= get_avatar_url('$microposts->email') ?>" alt="<?= $microposts->pseudo ?>" class="media-object">
    </div>
    <div class="media-body">
        <h4 class="media-heading">
            <?= e($microposts->pseudo) ?>
        </h4>
        <p>
            <i class="fa fa-clock-o"></i>
            <span class="timeago" title="<?= $microposts->created_at ?>"><?= $microposts->created_at ?></span>
        </p>
        <?= nl2br(e($microposts->content)); ?>
        <hr>
        <p>
            <?php if(user_has_already_liked_the_micropost($microposts->m_id)): ?>
                <a href="unlike_micropost.php?id=<?= $microposts->m_id?>">je n'aime plus</a>
            <?php else:?>
                <a href="like_micropost.php?id=<?= $microposts->m_id?>">j'aime</a>
            <?php endif;?>
        </p>
        nombre de j'aime(<?= $microposts->like_count?>)
    </div>
</article>
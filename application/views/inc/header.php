<header>
    <div class="container">
        <nav class="menu">
            <?php foreach ($findAll->result() as $page):
            if($page->idPageType == 1):
                echo '<a href="#">' . $page->name . '</a>';
            endif;
            endforeach; ?>
        </nav>

        <div class="logo">
            <a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/images/logo.svg" alt=""></a>
        </div>
         
        <nav class="submenu">
            <?php foreach ($findAll->result() as $page):
            if($page->idPageType == 2):
                echo '<a href="' . base_url() . $page->url . '">' . $page->name . '</a>';
            endif;
            endforeach; ?>
        </nav>
    </div>
</header>
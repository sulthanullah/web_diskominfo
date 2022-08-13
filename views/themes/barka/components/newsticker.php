<?php defined('BASEPATH') OR exit('No direct script access allowed') ?>

<?php $posts = get_latest_posts() ?>

<?php if($posts->num_rows() > 0) : ?>
  <div class="flex bg-gray-200 overflow-hidden relative text-sm">
    <span class="flex-shrink-0 inline-flex items-center px-3 bg-secondary text-white text-xs lg:text-base z-10">
     <div class="quote-title"><i class="fa fa-comments"></i> Breaking News</div>
      <span class="block lg:hidden"><span class="fa fa-bullhorn"></span></span>
    </span>
    <marquee class="w-full py-1 lg:py-2 inline-flex items-center divide-x-2 divide-solid divide-gray-700" onmouseover="this.stop();" onmouseout="this.start();">
      <?php foreach($posts->result() as $row) : ?>
        <span class="px-5"><a href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>" class="btn btn-sm action-button rounded-0"><?=$row->post_title?></i></a></span>
      <?php endforeach ?>
    </marquee>
  </div>
<?php endif ?>


		
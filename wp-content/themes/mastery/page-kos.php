<?php /* Template Name: Page with KOs */ ?>

<?php get_header(); ?>

  <div class="container">
    <div class="row">
      <h1><?php wp_title('') ?></h1>
    </div>
  </div>
<div class="container">
<?php
  $title = trim(wp_title(''));
  $year = simplexml_load_file(get_bloginfo('template_url') . "/". "Year 7" . ".xml");
?>
  <div class="row">
    <ul class="nav nav-tabs">
<?php
  $first = true;
  foreach ($year->term as $term){
    if ($first) {
      echo '<li class="active"><a data-toggle="tab" href="#' . $term["name"] . '">' . $term["name"] . '</a></li>';
    }
    else {
      echo '<li><a data-toggle="tab" href="#' . $term["name"]. '">' . $term["name"] . '</a></li>';
    }
    $first = false;
  }
?>  
    </ul>
  <div class="tab-content">
<?php
  $first = true;
  foreach($year->term as $term){
    if($first){
      echo '<div id="' . $term["name"] .  '" class="tab-pane fade in active">';
    } else {
      echo '<div id="' . $term["name"] .  '" class="tab-pane fade">';
    }
    foreach($term->ko as $ko) {
      echo ' <div class="col-sm-6" style="text-align: center">
              <h2>Part '.$ko['number'].'</h2>
              <img src="http://placehold.it/2339x1364" height=150 class="img-thumbnail">
              <p />
              <div class="btn-group-vertical">
                <button type="button" class="btn btn-primary">Quizlet</button>
                <button type="button" class="btn btn-primary">Bitesize</button>
              </div>
            </div>';

    }
    echo '</div>';
    $first = false;
  }
?>
  
  
</div>
<?php get_footer(); ?>
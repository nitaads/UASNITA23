<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <h1><?= isset($title) ? $title : 'Dashboard' ?></h1>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <?= isset($content) ? $content : '' ?>
    </div>
  </section>
</div>

<?php require_once './views/lang/es.php' ?>

<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><?php echo $navbar['brand'] ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if($data): ?>
          <?php foreach($data as $key => $row): ?>
            <?php if(is_null($row->dependencia_id)):?>
              <li class="nav-item dropdown mx-3">
                <a href="/view/ver/<?php echo $row->id ?>" class="btn btn-secondary btn-sm" type="button">
                  <?php echo $row->nombre_menu ?>
                </a>
                <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                  <?php foreach ($data as $key => $subMenu){
                    if($subMenu->dependencia_id == $row->id): ?>
                      <li> 
                          <a class="dropdown-item" href="/view/ver/<?php echo $subMenu->id ?>"><?php echo $subMenu->nombre_menu ?> &raquo;</a>
                          <ul class="submenu dropdown-menu">
                          <?php foreach ($data as $key => $subSubMenu){
                              if($subSubMenu->dependencia_id == $subMenu->id): ?>
                                <li><a class="dropdown-item" href="/view/ver/<?php echo $subSubMenu->id ?>"><?php echo $subSubMenu->nombre_menu?></a></li>
                              <?php endif; 
                            } ?>
                          </ul>
                      </li>
                    <?php endif; 
                  } ?>
                </ul>
              </li>        
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>     
      </ul> 
      <?php if(!$_GET['url']): ?>
      <div class="d-flex">        
        <a href="/menu" class="btn btn-success"><?php echo $navbar['btn-add'] ?></a>
      </div>     
      <?php endif; ?>
    </div>
  </div>
</nav>
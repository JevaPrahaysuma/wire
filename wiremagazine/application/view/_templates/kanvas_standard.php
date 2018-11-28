<div id="fh5co-offcanvas">
        <a href="#" class="fh5co-close-offcanvas js-fh5co-close-offcanvas"><span><i class="icon-cross3"></i> <span>Close</span></span></a>
        <div class="fh5co-bio">
        <?php foreach ($userlog as $user) {?>
            <figure>
                <img src="<?php echo URL.$user->alamatFoto; ?>" alt="Image" class="img-responsive">
            </figure>
            <h3 class="heading">Profil</h3>
            <h3><?php echo $user->namaUser?></h3>
            <p><?php echo $user->status?></p>
            <p>Bergabung sejak : <?php echo $user->tanggalGabung?></p>
            <br>

            <?php } ?>
            <button class="btn btn-default" onClick="window.location ='<?php echo URL; ?>home/edituser';">Edit Profil</button>
            <br>

            <button class="btn btn-default" onClick="window.location ='<?php echo URL; ?>home/upgradeuser';">Upgrade</button>

            <button class="btn btn-default" onClick="window.location ='<?php echo URL; ?>logout/logout_user';">Keluar</button>
        </div>
            <div class="fh5co-menu">
                <div class="fh5co-box">
                    <h3 class="heading">Pencarian</h3>
                    <form action="<?php echo URL; ?>home/index" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Cari Judul" name="key">
                        </div>
                    </form>
                </div>
                <div class="fh5co-box">
                    <h3 class="heading">Urutkan Post</h3>
                    <ul>
                        <li><a href="<?php echo URL; ?>home/index/?sort=Alfabet">Alfabet</a></li>
                        <li><a href="<?php echo URL; ?>home/index/?sort=Paling baru">Paling baru</a></li>
                        <li><a href="<?php echo URL; ?>home/index/?sort=Paling ramai">Paling ramai</a></li>
                    </ul>
                </div>
            </div>
        </div>
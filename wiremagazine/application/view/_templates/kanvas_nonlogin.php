<div id="fh5co-offcanvas">
        <a href="#" class="fh5co-close-offcanvas js-fh5co-close-offcanvas"><span><i class="icon-cross3"></i> <span>Close</span></span></a>
        <div class="fh5co-bio">
            <figure>
                <img src="<?php echo URL; ?>images/person/no-person.jpg" alt="Images" class="img-responsive">
            </figure>
            <!-- <h3 class="heading">Profil</h3> -->
            <h3>Guest</h3>
            <p>Temukan berbagai macam kemudahan dengan menggunakan akun</p>
            <br>
            <button class="btn btn-default" onClick="window.location ='<?php echo URL; ?>login/index';">Login</button>            
            <button class="btn btn-default" onClick="window.location ='<?php echo URL; ?>login/register';">Daftar</button>
        </div>
        <div class="fh5co-menu">
            <div class="fh5co-box">
                <h3 class="heading">Pencarian</h3>
                <form action="<?php echo URL; ?>home/index/" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Cari Judul" name="key">
                    </div>
                </form>
            </div>
            <div class="fh5co-box">
                <h3 class="heading">Urutkan</h3>
                <ul>
                    <li><a href="<?php echo URL; ?>home/index/?sort=Alfabet">Alfabet</a></li>
                    <li><a href="<?php echo URL; ?>home/index/?sort=Paling baru">Paling baru</a></li>
                    <li><a href="<?php echo URL; ?>home/index/?sort=Paling ramai">Paling ramai</a></li>
                </ul>
            </div>
        </div>
    </div>
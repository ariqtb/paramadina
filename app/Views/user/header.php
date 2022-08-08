<section id="hero" class="d-flex align-items-center">
  <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
    <div class="row justify-content-center">
      <div class="col-xl-7 col-lg-9 text-center">
        <h1><?= $konfigurasi['projek'] ?></h1>
        <h2>Terwujudnya Generasi Muda Yang Berwawasan Global, Berkarakter dan Terus Tumbuh Menjadi Pembelajar Sepanjang Hayat</h2>
      </div>
    </div>

    <div class="row icon-boxes">
      <div class="col-md-2 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
        <div class="icon-box">
          <img src="" class="img-fluid" alt="">
          <h4 class="title"><a href="program.html">Brincar ABC</a></h4>
          <p class="description">Paramadina Bogor Homeschooling</p>
        </div>
      </div>

      <div class="col-md-2 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
        <div class="icon-box">
          <img src="" class="img-fluid" alt="">
          <h4 class="title"><a href="program2.html">A Private Course</a></h4>
          <p class="description">Paramadina Bogor Homeschooling</p>
        </div>
      </div>

      <div class="col-md-2 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
        <div class="icon-box">
          <img src="" class="img-fluid" alt="">
          <h4 class="title"><a href="program3.html">Bilingual School</a></h4>
          <p class="description">Paramadina Bogor Homeschooling</p>
        </div>
      </div>

      <div class="col-md-2 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="500">
        <div class="icon-box">
          <img src="" class="img-fluid" alt="">
          <h4 class="title"><a href="program3.html">PKBM</a></h4>
          <p class="description">Paramadina Bogor Homeschooling</p>
        </div>
      </div>
    </div>

  </div>
</section>
<main id="main">

  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>About</h2>
        <p>Paramadina Bogor Homeschooling.</p>
      </div>

    </div>
  </section>

  <section id="gallery" class="gallery">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Gallery</h2>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="150">
        <div class="col-lg-12 d-flex justify-content-center">
        </div>
      </div>

      <div class="row gallery-container" data-aos="fade-up" data-aos-delay="300">

      <?php foreach($galeri as $row) : ?>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="gallery-wrap">
            <img src="<?= base_url('assets/upload/image/thumbs/' . $row['gambar']) ?>" class="img-fluid" alt="">
            <div class="gallery-info">
              <div class="portfolio-links">
                <a href="<?= base_url('assets/upload/image/thumbs/' . $row['gambar']) ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Paramadina Bogor Homeschooling"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>

        <?php endforeach; ?>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="gallery-wrap">
            <img src="<?= base_url() ?>/public/assets/img/IMG_20220523_105831.jpg" class="img-fluid" alt="">
            <div class="gallery-info">
              <div class="portfolio-links">
                <a href="<?= base_url() ?>/public/assets/img/IMG_20220523_105831.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Paramadina Bogor Homeschooling"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="gallery-wrap">
            <img src="<?= base_url() ?>/public/assets/img/IMG_20220523_105856_1.jpg" class="img-fluid" alt="">
            <div class="gallery-info">
              <div class="portfolio-links">
                <a href="<?= base_url() ?>/public/assets/img/IMG_20220523_105856_1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Paramadina Bogor Homeschooling"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="gallery-wrap">
            <img src="<?= base_url() ?>/public/assets/img/IMG_20220523_105925.jpg" class="img-fluid" alt="">
            <div class="gallery-info">
              <div class="portfolio-links">
                <a href="<?= base_url() ?>/public/assets/img/IMG_20220523_105925.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Paramadina Bogor Homeschooling"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="gallery-wrap">
            <img src="<?= base_url() ?>/public/assets/img/IMG_20220523_105959_1.jpg" class="img-fluid" alt="">
            <div class="gallery-info">
              <div class="portfolio-links">
                <a href="<?= base_url() ?>/public/assets/img/IMG_20220523_105959_1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Paramadina Bogor Homeschooling"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="gallery-wrap">
            <img src="<?= base_url() ?>/public/assets/img/IMG_20220523_110103.jpg" class="img-fluid" alt="">
            <div class="gallery-info">
              <div class="portfolio-links">
                <a href="<?= base_url() ?>/public/assets/img/IMG_20220523_110103.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Paramadina Bogor Homeschooling"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Teacher</h2>
      </div>
      <div class="row">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <?php foreach ($guru as $row) : ?>

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <div class="col-lg-12 col-md-6 align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                      <div class="member-img">
                        <img src="<?= base_url('assets/upload/image/thumbs/' . $row['gambar']) ?>" class="img-fluid" alt="">
                        <div class="social">
                          <a href="https://www.instagram.com/<?= $row['instagram'] ?>"><i class="bi bi-instagram"></i></a>
                          <a href="https://www.linkedin.com/in/<?= $row['linkedin'] ?>"><i class="bi bi-linkedin"></i></a>
                        </div>
                      </div>
                      <div class="member-info">
                        <h4><?= $row['nama'] ?></h4>
                        <span><?= $row['deskripsi'] ?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <?php endforeach; ?>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="col-lg-12 col-md-6 align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                  <div class="member">
                    <div class="member-img">
                      <img src="<?= base_url() ?>/public/assets/img/budifa.jpeg" class="img-fluid" alt="">
                      <div class="social">
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                      </div>
                    </div>
                    <div class="member-info">
                      <h4>Difa Dwi Astari</h4>
                      <span>Teaching in homeschooling makes me able to explore my teaching methods in wider range, learning characteristics in order to make the learning process comfortable for them.</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="col-lg-12 col-md-6 align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                  <div class="member">
                    <div class="member-img">
                      <img src="<?= base_url() ?>/public/assets/img/buflorentia.png" class="img-fluid" alt="">
                      <div class="social">
                        <a href="https://www.instagram.com/yrvrtchr/"><i class="bi bi-instagram"></i></a>
                        <a href="https://id.linkedin.com/in/florentia-thristianti-221839a5"><i class="bi bi-linkedin"></i></a>
                      </div>
                    </div>
                    <div class="member-info">
                      <h4>Florentia Thristianti</h4>
                      <span>Skilled in Lesson Planning, Educational Technology, Tutoring, Classroom Management, and Curriculum Development. Focused in Mathematics Teacher Education from Universitas Pendidikan Indonesia.</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="col-lg-12 col-md-6 align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                  <div class="member">
                    <div class="member-img">
                      <img src="" class="img-fluid" alt="">
                      <div class="social">
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                      </div>
                    </div>
                    <div class="member-info">
                      <h4>Paramadina Bogor Homeschooling</h4>
                      <span>Paramadina Bogor Homeschooling</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="col-lg-12 col-md-6 align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                  <div class="member">
                    <div class="member-img">
                      <img src="" class="img-fluid" alt="">
                      <div class="social">
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                      </div>
                    </div>
                    <div class="member-info">
                      <h4>Paramadina Bogor Homeschooling</h4>
                      <span>Paramadina Bogor Homeschooling</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="col-lg-12 col-md-6 align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                  <div class="member">
                    <div class="member-img">
                      <img src="" class="img-fluid" alt="">
                      <div class="social">
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                      </div>
                    </div>
                    <div class="member-info">
                      <h4>Paramadina Bogor Homeschooling</h4>
                      <span>Paramadina Bogor Homeschooling</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </div>
  </section>

  <section id="testimonials" class="testimonials">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Testimonial</h2>
      </div>

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">

          <?php foreach ($testimoni as $row) : ?>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  <?= $row['testimoni'] ?>
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="<?= base_url('assets/upload/image/thumbs/' . $row['gambar']) ?>" class="testimonial-img" alt="">
                <h3><?= $row['nama'] ?></h3>
                <h4><?= $row['deskripsi'] ?></h4>
              </div>
            </div>

          <?php endforeach; ?>

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Paramadina Bogor Homeschooling
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="<?= base_url() ?>/public/assets/img/KENZIE.jpeg" class="testimonial-img" alt="">
              <h3>Testimonial</h3>
              <h4>Paramadina Bogor Homeschooling</h4>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Paramadina Bogor Homeschooling
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="<?= base_url() ?>/public/assets/img/KIMOURA.jpeg" class="testimonial-img" alt="">
              <h3>Testimonial</h3>
              <h4>Paramadina Bogor Homeschooling</h4>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Paramadina Bogor Homeschooling
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="<?= base_url() ?>/public/assets/img/Mishya.jpeg" class="testimonial-img" alt="">
              <h3>Testimonial</h3>
              <h4>Paramadina Bogor Homeschooling</h4>
            </div>
          </div>

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section>

</main>
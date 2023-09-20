<template>
  <div class="container my-5 py-5">
    <div class="row">
      <!-- {{-- Carlos --}} -->
      <div v-for="artist in artists" class="col-lg-4" :key="artist.id">
        <div class="card">
          <img
            src="img/team/mario.jpg"
            class="card-img-top"
            :alt="
              'Portrait of ' +
              artist.Name +
              ', a tattoo artist at Firehouse Tattoo'
            "
          />
          <div class="card-body">
            <h5 class="card-title">{{ artist.Name }} {{ artist.LastName }}</h5>
            <p class="card-text">
              {{ artist.Description }}
            </p>
            <a
              class="btn btn-outline-dark btn-floating m-1"
              href="#!"
              role="button"
              ><i class="fab fa-instagram fs-5"></i
            ></a>
          </div>
        </div>
        <!-- <div class="card rounded-3 mb-3 wow animate__animated animate__fadeIn">
          <div class="row g-0">
            <div class="col-md-4 py-3 ps-3">
              <img alt="example" class="img-fluid" src="img/team/carlos.jpg" />
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h3 class="card-title">
                  {{ artist.Name }} {{ artist.LastName }}
                </h3>
                <p class="card-text">
                  {{ artist.Description }}
                </p>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      artists: [],
    };
  },
  methods: {
    startComponent() {
      this.loaderSave = true;
      axios
        .get('/admin/artists/list')
        .then((res) => {
          this.artists = res.data.artists;
        })
        .catch((error) => {
          // this.errorNewVilla = error.response.data.errors.name[0];
        })
        .finally((fin) => {
          this.loaderSave = false;
        });
    },
  },
  mounted() {
    this.startComponent();
  },
};
</script>

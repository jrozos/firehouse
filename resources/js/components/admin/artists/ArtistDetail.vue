<template>
  <div class="container">
    <div class="card mb-3 rounded-3 wow animate__animated animate__fadeInUp">
      <div class="row g-0">
        <div class="col-md-4">
          <img
            v-if="artist.Asset && artist.Asset.URL"
            :src="artist.Asset.URL"
            class="img-fluid rounded-start"
            :alt="
              'Portrait of ' +
              artist.Asset.Description +
              ' ' +
              artist.LastName +
              ', a tattoo artist at Firehouse Tattoo'
            "
          />
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">
              {{ artist.Name }} {{ artist.LastName }}
              <a
                v-if="artist.Instagram != null"
                class=""
                :href="artist.Instagram"
                role="button"
                target="_blank"
              >
                <i class="fab fa-instagram fs-4"></i>
              </a>
            </h5>
            <p class="card-text text-preline">
              {{ artist.Description }}
            </p>
          </div>
          <div class="card-footer border-0">
            <button
              class="btn btn-outline-dark btn-rounded"
              @click="closeDetail()"
            >
              Cerrar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['_Artist'],
  data() {
    return {
      artist: '',
    };
  },
  methods: {
    startComponent() {
      this.loaderSave = true;
      axios
        .get('/admin/artists/artist', {
          params: {
            _Artist: this._Artist,
          },
        })
        .then((res) => {
          this.artist = res.data.artist;
          this.scrollToArtistElement();
        })
        .catch((error) => {
          // Handle errors
        })
        .finally(() => {
          // this.loaderSave = false;
        });
    },
    scrollToArtistElement() {
      // Find the 'artist' element by its id
      const artistElement = document.getElementById('artist');

      // Check if the element exists
      if (artistElement) {
        // Calculate the offsetTop to determine its position
        const offsetTop = artistElement.offsetTop;

        // Define an offset (adjust this value as needed)
        const offset = 100; // You can adjust this value

        // Scroll to the element with a smooth animation
        window.scrollTo({
          top: offsetTop - offset,
          behavior: 'smooth',
        });
      }
    },
    closeDetail() {
      this.$root.Artist.Cleared = true;
      this.$root.Artist.Selected = '';
    },
  },
  mounted() {
    this.startComponent();
  },
};
</script>

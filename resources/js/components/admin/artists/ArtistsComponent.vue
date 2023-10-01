<template>
  <div class="container my-5 py-5">
    <div class="row">
      <!-- {{-- Carlos --}} -->
      <div
        v-for="artist in artists"
        class="mt-5 col-12 col-md-6 col-lg-4"
        :key="artist.id"
      >
        <div class="card rounded-3 wow animate__animated animate__fadeIn">
          <img
            v-if="artist.Asset && artist.Asset.URL"
            :src="artist.Asset.URL"
            class="card-img-top clip-2"
            :alt="
              'Portrait of ' +
              artist.Asset.Alt +
              ' ' +
              artist.LastName +
              ', a tattoo artist at Firehouse Tattoo'
            "
          />
          <div class="card-body">
            <h5 class="card-title">{{ artist.Name }} {{ artist.LastName }}</h5>
            <p class="card-text text-preline">
              {{ truncatedDescription(artist.Description) }}
            </p>
            <a href="" class="btn btn-outline-dark btn-rounded">Ver más</a>
          </div>
          <div class="card-footer">
            <a
              v-if="artist.Instagram != null"
              class="float-end"
              :href="artist.Instagram"
              role="button"
              target="_blank"
            >
              <i class="fab fa-instagram fs-4"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      artists: [],
      maxWords: 20, // Set your desired maximum description length
    };
  },
  methods: {
    truncatedDescription(description) {
      if (!description) return ''; // Handle empty description
      const words = description.split(' ');
      if (words.length <= this.maxWords) {
        return description;
      } else {
        return words.slice(0, this.maxWords).join(' ') + '...';
      }
    },
    startComponent() {
      this.loaderSave = true;
      axios
        .get('/admin/artists/list')
        .then((res) => {
          this.artists = res.data.artists;
        })
        .catch((error) => {
          // Handle errors
        })
        .finally(() => {
          this.loaderSave = false;
        });
    },
  },
  mounted() {
    this.startComponent();
  },
};
</script>

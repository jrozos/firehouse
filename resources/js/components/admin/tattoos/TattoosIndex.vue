<template>
  <div class="container-fluid" style="background-color: #273036">
    <div class="row mt-5- py-5">
      <div class="col-lg-10 col-md-8 col-sm-12">
        <h2 class="text-light display-1 wow animate__animated animate__fadeIn">
          Tattoos
        </h2>
      </div>
    </div>
    <div
      class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4 py-5"
    >
      <div v-for="(Image, index) in Assets.Images" :key="index" class="col">
        <div class="img-hover-zoom pb-3">
          <img
            v-if="Image && Image.URL"
            :src="Image.URL"
            class="img-fluid rounded-3 wow animate__ animate__fadeIn animated"
            :alt="getImageAltText(Image.Description)"
          />
        </div>
        <div class="text-white" v-for="Author in Image.author">
          <h6 class="card-title">
            <i class="fas fa-tint me-2"></i>{{ Author.Name }}
          </h6>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      Assets: {
        Images: [],
      },
    };
  },
  methods: {
    searchAsset(type) {
      axios
        .get('/admin/tattoos/list', {
          params: {
            type: type,
          },
        })
        .then((res) => {
          this.Assets.Images = res.data.Images;
          console.log(res.data.Files);
        })
        .catch((error) => {
          // this.errorNewVilla = error.response.data.errors.name[0];
        })
        .finally((fin) => {
          // this.loadingVilla = false;
        });
    },
    getImageAltText(description) {
      if (description === null) {
        // Devuelve una cadena alternativa si la descripción es nula
        return 'Tatuaje hecho en Firehouse Puerto Vallarta';
      } else {
        return `${description}, Tatuaje hecho en Firehouse Puerto Vallarta`;
      }
    },
  },
  mounted() {
    this.searchAsset('img');
  },
};
</script>

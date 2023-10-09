<template>
  <div class="row">
    <div class="col-12">
      <vue-dropzone
        ref="myVueDropzone"
        id="dropzone"
        :options="computedDropzoneOptions"
      ></vue-dropzone>
    </div>
    <div class="col-12 mt-4">
      <div class="card mb-4">
        <div class="card-header pb-0 p-3">
          <h6 class="mb-1">Assets</h6>
          <p class="text-sm">Architects design houses</p>
        </div>
        <div class="card-body p-3">
          <div class="row">
            <div
              v-for="(item, index) in items"
              :key="index"
              class="col-xl-3 col-md-6 mb-xl-0 mb-4"
            >
              <div class="card card-blog card-plain">
                <div class="position-relative">
                  <a class="d-block shadow-sm border-radius-xl">
                    <img
                      src="/assets/img/home-decor-1.jpg"
                      alt="img-blur-shadow"
                      class="img-fluid shadow-sm border-radius-xl"
                    />
                  </a>
                </div>
                <div class="card-body px-1 pb-0 py-2">
                  <p class="text-gradient text-dark mb-1 text-sm">Name</p>
                  <p class="mb-1 text-sm">Description</p>
                  <p class="mb-1 text-sm">Autor</p>
                  <span class="text-secondary text-xs font-weight-bold">
                    02/02/2023
                  </span>
                  <div
                    class="d-flex align-items-center justify-content-end mb-4"
                  >
                    <a
                      href="javascript:;"
                      class="text-secondary font-weight-bold text-xs pe-4"
                      data-bs-toggle="tooltip"
                      data-bs-placement="top"
                      title="Editar"
                      data-container="body"
                      data-animation="true"
                      @click="editInfo(artist._Artist)"
                    >
                      <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a
                      href="javascript:;"
                      class="text-secondary font-weight-bold text-xs"
                      data-bs-toggle="tooltip"
                      data-bs-placement="top"
                      title="Borrar"
                      data-container="body"
                      data-animation="true"
                      @click="deleteInfo(artist._Artist)"
                    >
                      <i class="fa-solid fa-trash-can"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import moment from 'moment';
import vue2Dropzone from 'vue2-dropzone';
import 'vue2-dropzone/dist/vue2Dropzone.min.css';
export default {
  components: {
    vueDropzone: vue2Dropzone,
  },
  data() {
    return {
      dropzoneOptions: {
        url: '/dashboard/artists/store-asset',
        thumbnailWidth: 200,
        maxFilesize: 1,
        maxFiles: 1,
        acceptedFiles: 'image/*',
        addRemoveLinks: true,
        dictDefaultMessage: "<i class='fa fa-cloud-upload'></i>UPLOAD ME",
        headers: {
          'X-CSRF-TOKEN': document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute('content'),
        },
      },
    };
  },
  computed: {
    computedDropzoneOptions() {
      const optionsCopy = { ...this.dropzoneOptions };

      // Add or update the _Artist property in the optionsCopy
      optionsCopy._Artist = this._Artist;

      // Add a custom `sending` callback
      optionsCopy.sending = (file, xhr, formData) => {
        // Add the _Artist value to the formData
        formData.append('_Artist', this._Artist);
      };

      return optionsCopy;
    },
    items() {
      // Generate an array of 20 items (you can change the count as needed)
      return Array.from({ length: 20 }, (_, index) => index);
    },
  },
  mounted() {
    console.log('Component mounted.');
  },
};
</script>

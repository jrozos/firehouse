<template>
  <div class="row">
    <div class="col-12">
      <vue-dropzone
        ref="myVueDropzone"
        id="dropzone"
        :options="dropzoneOptions"
        @vdropzone-complete="handleDropzoneComplete"
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
              v-for="(Image, index) in Assets.Images"
              :key="index"
              class="col-xl-3 col-md-6 mb-xl-0 mb-4"
            >
              <div class="card card-blog card-plain">
                <div class="position-relative">
                  <a class="d-block shadow-sm border-radius-xl">
                    <img
                      :src="Image.URL"
                      alt="img-blur-shadow"
                      class="img-fluid shadow-sm border-radius-xl"
                    />
                  </a>
                </div>
                <div class="card-body px-1 pb-0 py-2">
                  <p class="text-gradient text-dark mb-1 text-sm">
                    Nombre: {{ Image.Name }}
                  </p>
                  <p class="mb-1 text-sm">
                    Descripción: {{ Image.Description }}
                  </p>
                  <p class="mb-1 text-sm">Autor</p>
                  <span class="text-secondary text-xs font-weight-bold">
                    {{ formatFriendlyDate(Image.Created) }}
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
        url: '/dashboard/assets/store-asset',
        thumbnailWidth: 200,
        maxFilesize: 1,
        maxFiles: 10,
        acceptedFiles: 'image/*',
        addRemoveLinks: true,
        dictDefaultMessage: "<i class='fa fa-cloud-upload'></i> UPLOAD ME",
        headers: {
          'X-CSRF-TOKEN': document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute('content'),
        },
      },
      Assets: {
        Files: [],
        Images: [],
      },
      preDelete: {
        _Url: '',
      },
    };
  },
  methods: {
    formatFriendlyDate(date) {
      moment.locale('es-mx');
      return moment(date).format('L');
    },
    handleDropzoneComplete(files) {
      this.searchAsset('img');
    },
    searchAsset(type) {
      axios
        .post('/dashboard/assets/show-asset', {
          type: type,
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
    preDeleteAsset(_URL) {
      this._URL = _URL;
      this.deleteMedia(_URL);
    },
    deleteMedia(_URL) {
      axios
        .post('/dashboard/assets/delete-asset', {
          _URL: _URL,
        })

        .then((res) => {
          if (res.data.msg == 'success') {
            this.Assets.Images = res.data.Images;
          }
        })
        .catch((error) => {
          // this.errorNewVilla = error.response.data.errors.name[0];
          // this.preDelete.Loading = !1;
        })
        .finally((fin) => {
          // this.loadingVilla = false;
        });
    },
    clearPreDelete() {
      this.preDelete.Array = [];
    },
  },
  computed: {
    items() {
      // Generate an array of 20 items (you can change the count as needed)
      return Array.from({ length: 20 }, (_, index) => index);
    },
  },
  mounted() {
    this.searchAsset('img');
  },
};
</script>

<template>
  <div class="container-fluid">
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
            <p class="text-sm">Lista de Tattoos</p>
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
                        @click="createInfo(Image._URL)"
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
                        @click="
                          preDeleteAsset({
                            _URL: Image._URL,
                            Action: 'open',
                          })
                        "
                      >
                        <i class="fa-solid fa-trash-can"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div v-if="Info.Show" class="confirm-bg">
            <div class="row">
              <div class="col-12 col-sm-10 col-md-6 col-lg-6 center-center">
                <div
                  class="card shadow-sm wow animate__animated animate__fadeInUp"
                >
                  <div class="card-header pb-0 text-left">
                    <h3 class="card-title text-center">Asset</h3>
                    <p class="mb-0">Ingresa la información del asset</p>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-6">
                        <label for="itemSelect">Autor:</label>
                        <select
                          class="form-control"
                          id="itemSelect"
                          v-model="selectedArtist"
                          @change="addItem"
                        >
                          <option value="" disabled>Selecciona un autor</option>
                          <option
                            v-for="artist in artists"
                            :value="artist"
                            :key="artist._Artist"
                          >
                            {{ artist.Name }}
                          </option>
                        </select>
                        <div v-if="selectedArtists.length > 0">
                          <div class="d-flex justify-content-start my-1">
                            <div
                              v-for="(artist, index) in selectedArtists"
                              :key="artist._Artist"
                              class="me-1 animate__animated animate__fadeIn"
                            >
                              <button
                                class="btn btn-default"
                                @click="removeItem(index)"
                              >
                                {{ artist.Name }}
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12">
                        <label>Descripcion</label>
                        <p v-if="InfoErrors.Description" class="">
                          <small class="text-danger">
                            {{ InfoErrors.Description }}
                          </small>
                        </p>
                        <div class="input-group mb-3">
                          <textarea
                            v-model="Info.Description"
                            class="form-control"
                            rows="3"
                          ></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <div v-if="loaderSave">
                        <span class="display-6"
                          ><i class="fa-solid fa-spinner fa-spin"></i
                        ></span>
                      </div>
                      <div v-else>
                        <div class="row justify-content-end">
                          <div class="col-6 pt-3 text-end">
                            <button
                              type="button"
                              class="btn bg-gradient-info btn-sm mb-0"
                              @click="
                                validateForm({
                                  _Asset: Info._Asset,
                                })
                              "
                            >
                              Actualizar
                            </button>
                            <button
                              class="btn bg-gradient-danger btn-sm mb-0"
                              @click="cancelForm()"
                            >
                              Cancelar
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-if="preDelete.Show" class="confirm-bg">
      <div class="row">
        <div class="col-12 col-sm-10 col-md-6 col-lg-4 center-center">
          <div class="card shadow-sm wow animate__animated animate__fadeInUp">
            <div class="card-header pb-0 text-left">
              <h3 class="card-title text-center">
                <i class="fa-solid fa-triangle-exclamation"></i>
              </h3>
              <h4 class="card-title text-center">
                ¿Estás seguro de que deseas eliminar esta imagen?
              </h4>
            </div>
            <div class="card-body">
              <div class="row"></div>

              <div class="text-center">
                <div v-if="loaderSave">
                  <span class="display-6"
                    ><i class="fa-solid fa-spinner fa-spin"></i
                  ></span>
                </div>
                <div v-else>
                  <div class="row justify-content-justify">
                    <div class="col-12 pt-3 text-center">
                      <button
                        type="button"
                        class="btn bg-gradient-info btn-sm mb-0"
                        @click="
                          preDeleteAsset({
                            Action: 'delete',
                          })
                        "
                      >
                        Confirmar
                      </button>
                      <button
                        class="btn bg-gradient-danger btn-sm mb-0"
                        @click="
                          preDeleteAsset({
                            Action: 'close',
                          })
                        "
                      >
                        Cancelar
                      </button>
                    </div>
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
      artists: {},
      selectedArtist: '',
      selectedArtists: [],
      Info: {
        _Asset: '',
        Show: false,
        Description: '',
        Author: '',
      },
      InfoErrors: {
        Author: '',
        Description: '',
      },
      loaderSave: false,
      preDelete: {
        _Url: '',
        Show: false,
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
    searchArtists() {
      axios
        .get('/dashboard/assets/show-artist', {})
        .then((res) => {
          if (res.data.message === 'success') {
            this.artists = res.data.artists;
          } else {
            // Handle the case where the server response indicates an error
            console.error('Server response indicates an error:', res.data);
            // You can display an error message to the user if needed
            // this.errorMessage = 'An error occurred while fetching artist information.';
          }
        })
        .catch((error) => {
          // Handle Axios or network errors
          console.error('An error occurred:', error);
          // You can set an error message or perform other error handling actions here
          // this.errorMessage = 'An error occurred while fetching artist information.';
        })
        .finally(() => {
          // This block is executed whether the request succeeds or fails
          // You can use it to clean up, e.g., hiding loaders
        });
    },
    addItem() {
      if (
        this.selectedArtist &&
        !this.selectedArtists.includes(this.selectedArtist)
      ) {
        this.selectedArtists.push(this.selectedArtist);
      }
      this.selectedArtist = '';
    },

    removeItem(index) {
      this.selectedArtists.splice(index, 1);
    },
    createInfo(_Asset) {
      this.Info.Show = true;
      this.Info._Asset = _Asset;
      // this.Button.flag = 'create';
      this.clearInfo();
    },
    clearInfo() {
      // this.Info._Artist = '';
      this.Info.Author = '';
      this.Info.Description = '';
    },
    clearErrors() {
      this.InfoErrors.Author = '';
      this.InfoErrors.Description = '';
    },
    validateForm(_Asset) {
      this.clearErrors();

      if (this.Description !== undefined) {
        this.Description = this.Description.trim();
      }
      this.updateInfo(_Asset);
    },
    updateInfo(_Asset) {
      this.loaderSave = true;
      this.clearErrors();
      axios
        .post('/dashboard/assets/update-asset', {
          _Artists: this.selectedArtists,
          _Asset: this.Info._Asset,
          description: this.Info.Description,
        })
        .then((res) => {
          if (res.data.message === 'Success') {
            this.Info.Show = false;
            this.clearInfo();
            this.searchAsset('img');
          } else {
            this.InfoErrors.Description = res.data.description;
          }
        })
        .catch((error) => {
          if (
            error.response &&
            error.response.data &&
            error.response.data.errors
          ) {
            this.InfoErrors.Description = error.response.data.errors.description
              ? error.response.data.errors.description[0]
              : '';
          } else {
            console.error('Invalid error response structure:', error.response);
          }
          console.log('------------ Errors ------------');
        })
        .finally((fin) => {
          this.loaderSave = false;
        });
    },
    preDeleteAsset(data) {
      console.log(data.Action);

      switch (data.Action) {
        case 'open':
          this.preDelete.Show = true;
          this.preDelete._URL = data._URL;
          break;
        case 'close':
          this.preDelete.Show = false;
          this.preDelete._URL = '';
          break;
        case 'delete':
          this.deleteMedia(this.preDelete._URL);
          break;

        default:
          break;
      }
      console.log(this.preDelete._URL);
    },
    deleteMedia(_URL) {
      axios
        .post('/dashboard/assets/delete-asset', {
          _URL: _URL,
        })

        .then((res) => {
          if (res.data.msg == 'success') {
            this.preDelete.Show = false;
            this.searchAsset('img');
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
    selectedItemsWithKeys() {
      return this.selectedArtists.map((item) => {
        return {
          ...item,
          key: item._Artist, // Assuming 'name' is a unique identifier for artists
        };
      });
    },
  },
  mounted() {
    this.searchAsset('img');
    this.searchArtists();
  },
};
</script>

<template>
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="row align-items-center">
            <div class="col-6">
              <h6 class="mb-0">Artistas</h6>
            </div>
            <div class="col-6 text-end">
              <button
                type="button"
                class="btn btn-outline-dark"
                @click="createInfo()"
              >
                Crear
              </button>
            </div>
          </div>
        </div>
        <div v-if="Info.Show" class="confirm-bg">
          <div class="row">
            <div class="col-12 col-sm-10 col-md-6 col-lg-6 center-center">
              <div
                class="card shadow-sm wow animate__animated animate__fadeInUp"
              >
                <div
                  v-if="Button.flag === 'create'"
                  class="card-header pb-0 text-left"
                >
                  <h3 class="card-title text-center">Nuevo artista</h3>
                  <p class="mb-0">Ingresa la información del artista</p>
                </div>
                <div v-else class="card-header pb-0 text-left">
                  <h3 class="card-title text-center">Actualizar artista</h3>
                  <p class="mb-0">Editar la información del artista</p>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <label>Nombre</label>
                      <p
                        v-if="InfoErrors.Name"
                        class="wow animate__animated animate__headShake"
                      >
                        <small class="text-danger">
                          {{ InfoErrors.Name }}
                        </small>
                      </p>
                      <div class="input-group mb-3">
                        <input
                          v-model="Info.Name"
                          type="text"
                          :class="[
                            (Info.Name != '') & (InfoErrors.Name === '')
                              ? 'is-valid'
                              : InfoErrors.Name != ''
                              ? 'is-invalid'
                              : '',
                            'form-control',
                          ]"
                          placeholder="Nombre"
                          aria-label="Nombre"
                        />
                      </div>
                    </div>
                    <div class="col-6">
                      <label>Apellido</label>
                      <p
                        v-if="InfoErrors.LastName"
                        class="wow animate__animated animate__headShake"
                      >
                        <small class="text-danger">
                          {{ InfoErrors.LastName }}
                        </small>
                      </p>
                      <div class="input-group mb-3">
                        <input
                          v-model="Info.LastName"
                          type="text"
                          :class="[
                            (Info.LastName != '') & (InfoErrors.LastName === '')
                              ? 'is-valid'
                              : InfoErrors.LastName != ''
                              ? 'is-invalid'
                              : '',
                            'form-control',
                          ]"
                          placeholder="Apellido"
                          aria-label="Apellido"
                        />
                      </div>
                    </div>
                    <div class="col-6">
                      <label>E-mail</label>
                      <p
                        v-if="InfoErrors.Email"
                        class="wow animate__animated animate__headShake"
                      >
                        <small class="text-danger">
                          {{ InfoErrors.Email }}
                        </small>
                      </p>
                      <div class="input-group mb-3">
                        <input
                          v-model="Info.Email"
                          type="email"
                          :class="[
                            (Info.Email != '') & (InfoErrors.Email === '')
                              ? 'is-valid'
                              : InfoErrors.Email != ''
                              ? 'is-invalid'
                              : '',
                            'form-control',
                          ]"
                          placeholder="E-mail"
                          aria-label="E-mail"
                        />
                      </div>
                    </div>
                    <div class="col-6">
                      <label>Cel</label>
                      <p
                        v-if="InfoErrors.Phone"
                        class="wow animate__animated animate__headShake"
                      >
                        <small class="text-danger">
                          {{ InfoErrors.Phone }}
                        </small>
                      </p>
                      <div class="input-group mb-3">
                        <input
                          v-model="Info.Phone"
                          type="tel"
                          :class="[
                            (Info.Phone != '') & (InfoErrors.Phone === '')
                              ? 'is-valid'
                              : InfoErrors.Phone != ''
                              ? 'is-invalid'
                              : '',
                            'form-control',
                          ]"
                          placeholder="999-99-99-99-9"
                          aria-label="Cel"
                        />
                      </div>
                    </div>
                    <div class="col-6">
                      <label>Instagram</label>
                      <p
                        v-if="InfoErrors.Instagram"
                        class="wow animate__animated animate__headShake"
                      >
                        <small class="text-danger">
                          {{ InfoErrors.Instagram }}
                        </small>
                      </p>
                      <div class="input-group mb-3">
                        <input
                          v-model="Info.Instagram"
                          type="text"
                          :class="[
                            (Info.Instagram != '') &
                            (InfoErrors.Instagram === '')
                              ? 'is-valid'
                              : InfoErrors.Instagram != ''
                              ? 'is-invalid'
                              : '',
                            'form-control',
                          ]"
                        />
                      </div>
                    </div>
                    <div class="col-6">
                      <label>Orden</label>
                      <p
                        v-if="InfoErrors.Sort"
                        class="wow animate__animated animate__headShake"
                      >
                        <small class="text-danger">
                          {{ InfoErrors.Sort }}
                        </small>
                      </p>
                      <div class="input-group mb-3">
                        <input
                          v-model="Info.Sort"
                          type="text"
                          :class="[
                            (Info.Sort != '') & (InfoErrors.Sort === '')
                              ? 'is-valid'
                              : InfoErrors.Sort != ''
                              ? 'is-invalid'
                              : '',
                            'form-control',
                          ]"
                        />
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
                  <!-- Dropzone -->
                  <div v-if="Button.flag === 'update'" class="row">
                    <vue-dropzone
                      ref="myVueDropzone"
                      id="dropzone"
                      :options="computedDropzoneOptions"
                    ></vue-dropzone>
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
                            v-if="Button.flag === 'create'"
                            type="button"
                            class="btn bg-gradient-info btn-sm mb-0"
                            @click="validateForm()"
                          >
                            Crear
                          </button>
                          <button
                            v-else
                            type="button"
                            class="btn bg-gradient-info btn-sm mb-0"
                            @click="validateForm(Info._Artist)"
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
        <div class="card-body px-0 pt-0 pb-2">
          <div v-if="loaderSave" class="text-center">
            <span class="display-6"
              ><i class="fa-solid fa-droplet fa-bounce"></i
            ></span>
          </div>
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th
                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                  >
                    Nombre
                  </th>
                  <th
                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                  >
                    Teléfono
                  </th>

                  <th
                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                  >
                    Creado
                  </th>
                  <th
                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                  >
                    Actualizado
                  </th>
                  <th
                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                  >
                    Editado
                  </th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="artist in artists" :key="artist.id">
                  <td>
                    <div class="d-flex py-1">
                      <div>
                        <img
                          src="/assets/img/team-2.jpg"
                          class="avatar avatar-sm me-3"
                          alt="user1"
                        />
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">
                          {{ artist.Name }} {{ artist.LastName }}
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          {{ artist.Email }}
                        </p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">
                      {{ artist.Phone }}
                    </p>
                  </td>

                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{
                      formatFriendlyDate(artist.Created)
                    }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{
                      formatFriendlyDate(artist.Updated)
                    }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{
                      artist.CreatedBy
                    }}</span>
                  </td>
                  <td class="align-middle">
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
                  </td>
                </tr>
              </tbody>
            </table>
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
      _Artist: '', // Initialize _Artist with the value you want to send
      dropzoneOptions: {
        url: '/dashboard/artists/storeasset',
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
      Artist_Asset: {
        Files: [],
        Images: [],
      },
      artists: [],

      loaderSave: false,
      Info: {
        Show: false,
        _Artist: '',
        Name: '',
        LastName: '',
        Email: '',
        Phone: '',
        Instagram: '',
        Sort: '',
        Description: '',
      },

      InfoErrors: {
        Name: '',
        LastName: '',
        Email: '',
        Phone: '',
        Instagram: '',
        Sort: '',
        Description: '',
        isValid: '',
      },

      Button: {
        flag: 'create',
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

        // You can also append other form fields if needed
        formData.append('otherField', 'otherValue');
      };

      return optionsCopy;
    },
  },
  methods: {
    startComponent() {
      this.loaderSave = true;
      axios
        .get('/dashboard/artists/list')
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
    formatFriendlyDate(date) {
      moment.locale('es-mx');
      return moment(date).format('L');
    },
    createInfo() {
      this.Info.Show = true;
      this.Button.flag = 'create';
      this.clearInfo();
    },
    cancelForm() {
      this.Info.Show = false;
      this.clearErrors();
    },
    clearErrors() {
      this.InfoErrors.Name = '';
      this.InfoErrors.LastName = '';
      this.InfoErrors.Email = '';
      this.InfoErrors.Phone = '';
      this.InfoErrors.Instagram = '';
      this.InfoErrors.Sort = '';
      this.InfoErrors.Description = '';
      this.InfoErrors.isValid = '';
    },
    clearInfo() {
      this.Info._Artist = '';
      this.Info.Name = '';
      this.Info.LastName = '';
      this.Info.Email = '';
      this.Info.Phone = '';
      this.Info.Instagram = '';
      this.Info.Sort = '';
      this.Info.Description = '';
    },
    validateForm(_Artist) {
      this.clearErrors();

      this.InfoErrors.Name =
        this.Info.Name.trim() === '' ? 'El nombre es requerido.' : '';
      this.InfoErrors.LastName =
        this.Info.LastName.trim() === '' ? 'El apellido es requerido.' : '';
      this.InfoErrors.Email =
        this.Info.Email && !this.validEmail(this.Info.Email)
          ? 'E-mail inválido ej: aaa@aaa.aaa'
          : '';
      this.InfoErrors.Phone = !this.Info.Phone
        ? '' // Allow empty field
        : !this.validatePhoneNumber(this.Info.Phone)
        ? 'Teléfono inválido ej: 999-99-99-99-9'
        : '';
      if (this.Instagram !== undefined) {
        this.Instagram = this.Instagram.trim();
      }

      if (this.Sort !== undefined) {
        this.Sort = this.Sort.trim();
      }

      if (this.Description !== undefined) {
        this.Description = this.Description.trim();
      }

      if (
        !this.InfoErrors.Name &&
        !this.InfoErrors.LastName &&
        !this.InfoErrors.Email &&
        !this.InfoErrors.Phone
      ) {
        if (_Artist) {
          this.updateInfo(_Artist);
        } else {
          this.saveInfo();
        }
      }
    },
    validEmail: function (email) {
      var re =
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    },
    validatePhoneNumber(phone) {
      var re = /^\d{10}$/;
      return re.test(phone);
    },
    saveInfo() {
      this.loaderSave = true;
      this.clearErrors();
      axios
        .post('/dashboard/artists/store', {
          name: this.Info.Name,
          last_name: this.Info.LastName,
          email: this.Info.Email,
          phone_number: this.Info.Phone,
          instagram: this.Info.Instagram,
          sort: this.Info.Sort,
          description: this.Info.Description,
        })
        .then((res) => {
          this.artist = res.data.artist;
          if (res.data.message === 'Success') {
            this.Info.Show = false;
            this.clearInfo();
            this.startComponent();
          } else {
            this.InfoErrors.Name = res.data.name;
            this.InfoErrors.LastName = res.data.last_name;
            this.InfoErrors.Email = res.data.email;
            this.InfoErrors.Phone = res.data.phone_number;
            this.InfoErrors.Instagram = res.data.instagram;
            this.InfoErrors.Sort = res.data.sort;
            this.InfoErrors.Description = res.data.description;
          }
        })
        .catch((error) => {
          if (
            error.response &&
            error.response.data &&
            error.response.data.errors
          ) {
            this.InfoErrors.Name = error.response.data.errors.name
              ? error.response.data.errors.name[0]
              : '';
            this.InfoErrors.LastName = error.response.data.errors.last_name
              ? error.response.data.errors.last_name[0]
              : '';
            this.InfoErrors.Email = error.response.data.errors.email
              ? error.response.data.errors.email[0]
              : '';
            this.InfoErrors.Phone = error.response.data.errors.phone_number
              ? error.response.data.errors.phone_number[0]
              : '';
            this.InfoErrors.Instagram = error.response.data.errors.instagram
              ? error.response.data.errors.instagram[0]
              : '';
            this.InfoErrors.Sort = error.response.data.errors.sort
              ? error.response.data.errors.sort[0]
              : '';
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
    editInfo(_Artist) {
      this._Artist = _Artist;
      this.Button.flag = 'update';

      axios
        .get('/dashboard/artists/edit', {
          params: {
            _Artist: this._Artist,
          },
        })
        .then((res) => {
          if (res.data.message === 'Success') {
            this.Info.Show = true;
            this.Info._Artist = res.data.artist._Artist;
            this.Info.Name = res.data.artist.Name;
            this.Info.LastName = res.data.artist.LastName;
            this.Info.Email = res.data.artist.Email;
            this.Info.Phone = res.data.artist.Phone;
            this.Info.Instagram = res.data.artist.Instagram;
            this.Info.Sort = res.data.artist.Sort;
            this.Info.Description = res.data.artist.Description;
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
          this.loaderSave = false;
        });
    },
    updateInfo(_Artist) {
      this.loaderSave = true;
      this.clearErrors();
      axios
        .post('/dashboard/artists/update', {
          _Artist: _Artist,
          name: this.Info.Name,
          last_name: this.Info.LastName,
          email: this.Info.Email,
          phone_number: this.Info.Phone,
          instagram: this.Info.Instagram,
          sort: this.Info.Sort,
          description: this.Info.Description,
        })
        .then((res) => {
          if (res.data.message === 'Success') {
            this.Info.Show = false;
            this.clearInfo();
            this.startComponent();
          } else {
            this.InfoErrors.Name = res.data.name;
            this.InfoErrors.LastName = res.data.last_name;
            this.InfoErrors.Email = res.data.email;
            this.InfoErrors.Phone = res.data.phone_number;
            this.InfoErrors.Instagram = res.data.instagram;
            this.InfoErrors.Sort = res.data.sort;
            this.InfoErrors.Description = res.data.description;
          }
        })
        .catch((error) => {
          if (
            error.response &&
            error.response.data &&
            error.response.data.errors
          ) {
            this.InfoErrors.Name = error.response.data.errors.name
              ? error.response.data.errors.name[0]
              : '';
            this.InfoErrors.LastName = error.response.data.errors.last_name
              ? error.response.data.errors.last_name[0]
              : '';
            this.InfoErrors.Email = error.response.data.errors.email
              ? error.response.data.errors.email[0]
              : '';
            this.InfoErrors.Phone = error.response.data.errors.phone_number
              ? error.response.data.errors.phone_number[0]
              : '';
            this.InfoErrors.Instagram = error.response.data.errors.instagram
              ? error.response.data.errors.instagram[0]
              : '';
            this.InfoErrors.Sort = error.response.data.errors.sort
              ? error.response.data.errors.sort[0]
              : '';
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
    deleteInfo(_Artist) {
      this.loaderSave = true;
      axios
        .get('/dashboard/artists/delete', {
          params: {
            _Artist: _Artist,
          },
        })
        .then((res) => {
          if (res.data.message === 'Success') {
            this.startComponent();
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
          this.loaderSave = false;
        });
    },
  },
  mounted() {
    this.startComponent();
  },
};
</script>

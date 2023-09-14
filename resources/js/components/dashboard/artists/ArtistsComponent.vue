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
                @click="Info.Show = true"
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
                <div class="card-header pb-0 text-left">
                  <h3 class="card-title text-center">Nuevo artista</h3>
                  <p class="mb-0">Ingresa la información del artista</p>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <label>Nombre</label>
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
                      <p
                        v-if="InfoErrors.Name"
                        class="wow animate__animated animate__headShake"
                      >
                        <small class="text-danger">
                          {{ InfoErrors.Name }}
                        </small>
                      </p>
                    </div>
                    <div class="col-6">
                      <label>Apellido</label>
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
                      <p
                        v-if="InfoErrors.LastName"
                        class="wow animate__animated animate__headShake"
                      >
                        <small class="text-danger">
                          {{ InfoErrors.LastName }}
                        </small>
                      </p>
                    </div>
                    <div class="col-6">
                      <label>E-mail</label>
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
                      <p
                        v-if="InfoErrors.Email"
                        class="wow animate__animated animate__headShake"
                      >
                        <small class="text-danger">
                          {{ InfoErrors.Email }}
                        </small>
                      </p>
                    </div>
                    <div class="col-6">
                      <label>Cel</label>
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
                      <p
                        v-if="InfoErrors.Phone"
                        class="wow animate__animated animate__headShake"
                      >
                        <small class="text-danger">
                          {{ InfoErrors.Phone }}
                        </small>
                      </p>
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
                            @click="validateForm()"
                          >
                            Crear
                          </button>
                          <button
                            class="btn bg-gradient-danger btn-sm mb-0"
                            @click="clearErrors()"
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
                      formatFriendlyDate(artist.Created)
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
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- dialogs of Success or Error -->
    <div v-if="Alert.Show" class="confirm-bg">
      <div class="row">
        <!-- Alerta de éxito -->
        <div class="col-12 col-sm-10 col-md-6 col-lg-4 center-center">
          <div class="card shadow-sm wow fadeInUp">
            <div
              v-if="Alert.Title !== ''"
              :class="{
                'card-header py-2': true,
                'card-header-info': Alert.Type,
                'card-header-danger': !Alert.Type,
              }"
            >
              <h3 class="card-title text-center">{{ Alert.Title }}</h3>
            </div>
            <div class="card-body">
              <div class="row" v-html="Alert.Message"></div>
              <div class="row">
                <div class="col-12 pt-3 text-center">
                  <button
                    class="btn btn-round bg-gradient-danger btn-lg w-100 mt-4 mb-0"
                    @click="Alert.Show = false"
                  >
                    Cerrar
                  </button>
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
export default {
  data() {
    return {
      // activeSave:false,
      // activeReset:false,
      // aproved:false,
      artists: [],

      loaderSave: false,
      Info: {
        Show: false,
        Name: '',
        LastName: '',
        Email: '',
        Phone: '',
      },

      InfoErrors: {
        Name: '',
        LastName: '',
        Email: '',
        Phone: '',
        isValid: '',
      },

      Alert: {
        Show: false,
        Type: false, // false to Error or true to Success
        Title: '',
        Message: '',
      },
    };
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
    clearErrors() {
      this.Info.Show = false;
      this.InfoErrors.Name = '';
      this.InfoErrors.LastName = '';
      this.InfoErrors.Email = '';
      this.InfoErrors.Phone = '';
      this.InfoErrors.isValid = '';
    },
    validateForm() {
      this.InfoErrors.Name = '';
      this.InfoErrors.LastName = '';
      this.InfoErrors.Email = '';
      this.InfoErrors.Phone = '';
      this.InfoErrors.isValid = '';

      this.InfoErrors.Name =
        this.Info.Name.trim() === '' ? 'El nombre es requerido.' : '';
      this.InfoErrors.LastName =
        this.Info.LastName.trim() === '' ? 'El apellido es requerido.' : '';
      this.InfoErrors.Email =
        !this.Info.Email.trim() === ''
          ? 'El e-mail es requerido.'
          : !this.validEmail(this.Info.Email)
          ? 'E-mail invalido ej: aaa@aaa.aaa'
          : '';
      this.InfoErrors.Phone = !this.validatePhoneNumber(this.Info.Phone)
        ? 'Teléfono invalido ej: 999-99-99-99-9'
        : '';

      if (
        !this.InfoErrors.Name &&
        !this.InfoErrors.LastName &&
        !this.InfoErrors.Email &&
        !this.InfoErrors.Phone
      ) {
        // Form is valid, you can submit it or perform further actions.
        console.log('Form is valid!');
        this.saveInfo();
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
      this.InfoErrors.Name = '';
      this.InfoErrors.LastName = '';
      this.InfoErrors.Email = '';
      this.InfoErrors.Phone = '';
      this.InfoErrors.isValid = '';
      axios
        .post('/dashboard/artists/store', {
          name: this.Info.Name,
          last_name: this.Info.LastName,
          email: this.Info.Email,
          phone_number: this.Info.Phone,
        })
        .then((res) => {
          this.artist = res.data.artist;
          if (res.data.message === 'Success') {
            this.Info.Show = false;
            this.startComponent();
          } else {
            this.InfoErrors.Name = res.data.name;
            this.InfoErrors.LastName = res.data.last_name;
            this.InfoErrors.Email = res.data.email;
            this.InfoErrors.Phone = res.data.phone_number;
          }
        })
        .catch((error) => {
          this.InfoErrors.Name = error.response.data.errors.name[0];
          this.InfoErrors.LastName = error.response.data.errors.last_name[0];
          this.InfoErrors.Email = error.response.data.errors.email[0];
          this.InfoErrors.Phone = error.response.data.errors.phone_number[0];
          console.log('------------ Errors ------------');
          console.log(error);
        })
        .finally((fin) => {
          this.loaderSave = false;
          this.Info.Name = '';
          this.Info.LastName = '';
          this.Info.Email = '';
          this.Info.Phone = '';
        });
    },
  },
  computed: {},
  mounted() {
    this.startComponent();
  },
};
</script>

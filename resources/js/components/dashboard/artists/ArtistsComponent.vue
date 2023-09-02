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
                class="btn btn-block btn-info mb-0"
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
                      <button
                        type="button"
                        class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0"
                        @click="validateForm()"
                      >
                        Crear
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
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
                    Registro
                  </th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img
                          src="/assets/img/team-2.jpg"
                          class="avatar avatar-sm me-3"
                          alt="user1"
                        />
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">John Michael</h6>
                        <p class="text-xs text-secondary mb-0">
                          john@creative-tim.com
                        </p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">322-72-85-289</p>
                  </td>

                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"
                      >23/04/18</span
                    >
                  </td>
                  <td class="align-middle">
                    <a
                      href="javascript:;"
                      class="text-secondary font-weight-bold text-xs"
                      data-toggle="tooltip"
                      data-original-title="Edit user"
                    >
                      Edit
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
      axios
        .get('/dashboard/artists/list')
        .then((res) => {
          this.artists = res.data.artists;
        })
        .catch((error) => {
          // this.errorNewVilla = error.response.data.errors.name[0];
        })
        .finally((fin) => {
          // this.loadingVilla = false;
        });
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
            this.Alert.Show = true;
            this.Alert.Type = true;
            this.Alert.Message = res.data.message;

            this.startComponent();
          } else {
            this.InfoErrors.Name = res.data.name;
            this.InfoErrors.LastName = res.data.last_name;
            this.InfoErrors.Email = res.data.email;
            this.InfoErrors.Phone = res.data.phone_number;
          }
        })
        .catch((error) => {
          this.InfoErrors.Name = error.response.data.errors.name;
          this.InfoErrors.LastName = error.response.data.errors.last_name;
          this.InfoErrors.Email = error.response.data.errors.email;
          this.InfoErrors.Phone = error.response.data.errors.phone_number;
          console.log('------------ Errors ------------');
          console.log(error);
        })
        .finally((fin) => {
          this.loaderSave = false;
          console.log(this.Alert);
        });
    },
  },
  computed: {},
  mounted() {
    this.startComponent();
    console.log('Component mounted.');
  },
};
</script>

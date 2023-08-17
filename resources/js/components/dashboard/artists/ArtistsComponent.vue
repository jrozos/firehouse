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
                                data-bs-toggle="modal"
                                data-bs-target="#modal-form"
                            >
                                Crear
                            </button>
                        </div>
                    </div>
                </div>
                <div
                    class="modal fade"
                    id="modal-form"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="modal-form"
                    aria-hidden="true"
                >
                    <div
                        class="modal-dialog modal-dialog-centered modal-lg"
                        role="document"
                    >
                        <div class="modal-content">
                            <div class="modal-body p-0">
                                <div class="card card-plain">
                                    <div class="card-header pb-0 text-left">
                                        <h3
                                            class="font-weight-bolder text-info text-gradient"
                                        >
                                            Nuevo artista
                                        </h3>
                                        <p class="mb-0">
                                            Ingresa la información del artista
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                                <div class="col-6">
                                                    <label>Nombre</label>
                                                    <div
                                                        class="input-group mb-3"
                                                    >
                                                        <input
                                                            v-model="Info.Name"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Nombre"
                                                            aria-label="Nombre"
                                                        />
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label>Apellido</label>
                                                    <div
                                                        class="input-group mb-3"
                                                    >
                                                        <input
                                                            v-model="Info.LastName"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Apellido"
                                                            aria-label="Apellido"
                                                        />
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label>E-mail</label>
                                                    <div
                                                        class="input-group mb-3"
                                                    >
                                                        <input
                                                            v-model="Info.Email"
                                                            type="email"
                                                            class="form-control"
                                                            placeholder="E-mail"
                                                            aria-label="E-mail"
                                                        />
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label>Cel</label>
                                                    <div
                                                        class="input-group mb-3"
                                                    >
                                                        <input
                                                            v-model="Info.Phone"
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Cel"
                                                            aria-label="Cel"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button
                                                    type="button"
                                                    class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0"
                                                    @click="saveInfo($event)"
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
                                            <div
                                                class="d-flex flex-column justify-content-center"
                                            >
                                                <h6 class="mb-0 text-sm">
                                                    John Michael
                                                </h6>
                                                <p
                                                    class="text-xs text-secondary mb-0"
                                                >
                                                    john@creative-tim.com
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p
                                            class="text-xs font-weight-bold mb-0"
                                        >
                                            322-72-85-289
                                        </p>
                                    </td>

                                    <td class="align-middle text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold"
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
						<div v-if="Alert.Title !== ''" :class="{'card-header py-2':true, 'card-header-info':Alert.Type, 'card-header-danger':!Alert.Type}">
							<h3 class="card-title text-center">{{ Alert.Title }}</h3>
						</div>
						<div class="card-body">
							<div class="row" v-html="Alert.Message"></div>
							<div class="row">
								<div class="col-12 pt-3 text-center">
									<button :class="'btn-danger btn-sm btn-rounded'" @click="Alert.Show = false">
										<i class="fas fa-times"></i>
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
            // loaderSave:false,
            Info:{
                Name:'',
                LastName:'',
                Email:'',
                Phone:''
            },

            Alert:{
                Show:false,
                Type:false, // false to Error or true to Success
                Title:'',
                Message:'',
            },
            
        }
	},
    methods:{
        saveInfo() {
				this.loaderSave = true;

				axios.post('/dashboard/create', {
					'Name': this.Info.Name,
					'LastName': this.Info.LastName,
					'Email': this.Info.Email,
					'Phone': this.Info.Phone,
				})
				.then((res) =>{
					// this.rates = res.data;
					this.resetRatePanel();
					if (res.data.FlagReloadRates) {
						this.searchRates();
					}
				})
				.catch((error) =>{
					// this.errorNewVilla = error.response.data.errors.name[0];
					console.log('------------ Errors ------------');
					console.log(error);
					// console.log(error.response);
					// console.log(error.response.status);
					// console.log(error.response.data);
					this.Alert.Show = true;
					this.Alert.Type = false;
					if (typeof error.response === "undefined" || error.response.status === 0) {
						this.Alert.Title = 'Network Error';
						this.Alert.Message = '<div class="col-12">'+
									'<h4 class="text-white">Check your network connection.</h4>'+
								'</div>';
					} else {
						let errors = error.response.data;
						this.Alert.Title = errors.message;
						this.Alert.Message = '';
						if (error.response.status === 500) {
							this.Alert.Message = '<div class="col-12">'+
									'<h4 class="text-white text-center">Try to reload the page.</h4>'+
									'<h4 class="text-white text-center">If the problem persist contact of administrator.</h4>'+
								'</div>';
						} else {
							errors.errors.forEach(function(err, key) {
								let style = '';
								if (key === 0) { style = ' style="margin-top: -1rem;"'; }
								this.Alert.Message += '<div class="col-12"'+style+'>'+
										'<h5 class="text-white mb-0 mt-3"><b>'+err.Tag+':</b></h5>'+
										'<h6 class="text-white my-0">'+err.Error+'</h6>'+
									'</div>';
							}.bind(this));
						}
					}
				})
				.finally((fin) =>{
					this.loaderSave = !1;
					console.log(this.Alert);
				})
			},
    },
    mounted() {
        console.log("Component mounted.");
    },
};
</script>

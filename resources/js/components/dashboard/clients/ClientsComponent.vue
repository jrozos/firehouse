<template>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h6 class="mb-0">Clientes</h6>
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
                                            Nuevo cliente
                                        </h3>
                                        <p class="mb-0">
                                            Ingresa la información del cliente
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <form role="form text-left">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label>Nombre</label>
                                                    <div
                                                        class="input-group mb-3"
                                                    >
                                                        <input
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
                                                >
                                                    Crear
                                                </button>
                                            </div>
                                        </form>
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
                                            Manager
                                        </p>
                                        <p class="text-xs text-secondary mb-0">
                                            Organization
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
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    },
};
</script>

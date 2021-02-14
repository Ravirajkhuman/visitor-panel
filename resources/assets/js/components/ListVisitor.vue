<template>
    <div>
        <h3 class="text-center">Visitors List</h3><br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Date of Birth</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="visitor in visitors.data" :key="visitor.id">
                <td>{{ visitor.id }}</td>
                <td>{{ visitor.first_name }}</td>
                <td>{{ visitor.last_name }}</td>
                <td>{{ visitor.email }}</td>
                <td>{{ visitor.dob }}</td>
                <td>{{ visitor.created_at }}</td>
                <td>{{ visitor.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <button class="btn btn-danger" @click="deletePost(visitor.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <pagination :data="visitors" :limit="10" :align="align" @pagination-change-page="getResults"></pagination>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                visitors: {},
                align:'center'
            }
        },
        mounted() {
            this.getResults();
        },

        methods: {
            deletePost(id) {
                axios.delete(`http://localhost:8000/api/deleteVisitor/${id}`)
                .then(response => {
                    let i = this.visitors.data.map(item => item.id).indexOf(id); // find index of your object
                    this.visitors.data.splice(i, 1)
                });
            },

            getResults(page = 1) {
                axios.get('http://localhost:8000/api/getVisitorList?page=' + page)
                .then(response => {
                    this.visitors = response.data;
                });
            }
        }
    }
</script>
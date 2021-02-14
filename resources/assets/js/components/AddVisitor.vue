<template>
    <div>
        <h3 class="text-center">Add Visitor</h3>
        <div class="row">
            <div class="col-md-12">
                <form @submit.prevent="addVisitor">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" v-model="visitor.first_name" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" v-model="visitor.last_name" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" v-model="visitor.email" required>
                    </div>

                    <div class="form-group">
                        <label>Date Of Birth</label>
                        <input type="date" class="form-control" v-model="visitor.dob" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Visitor</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                visitor: {}
            }
        },
        methods: {
            addVisitor() {
                axios.post('http://localhost:8000/api/addVisitors', this.visitor)
                .then(response => (
                    this.$router.push({name: 'visitor-list'})
                ))
                .catch(error => console.log(error))
                .finally(() => this.loading = false)
            }
        }
    }
</script>
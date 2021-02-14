<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/visitor-list" class="nav-item nav-link">Visitor List</router-link>
                    <router-link to="/visitor-add" class="nav-item nav-link">Add Visitor</router-link>
                </div>
            </div>
        </nav>
        <br/>
        <router-view></router-view>
    </div>
</template>
 
<script>
    export default {}
</script>
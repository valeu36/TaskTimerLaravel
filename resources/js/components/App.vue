<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import api from '../api';
    export default {
        mounted() {
        	this.test();
            console.log('Component mounted.')
        },
        methods: {
        	async test() {
        		try {
        			console.log('ok');
        		    const {data} = await api.index('/tasks');
        		    console.log(data);
                } catch (e) {
        			console.log(e);
                }
            }
        }
    }
</script>

<template>
    <div>
        <h3 class="text-sm uppercase tracking-wide text-80 bg-30 p-3">{{ filter.name }}</h3>

        <div class="p-2">
            <input type="text"
                   v-model="columnValue"
                   class="block w-full form-control-sm form-input form-input-bordered"
                   @change="handleChange"
            >
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            resourceName: {
                type: String,
                required: true,
            },
            filterKey: {
                type: String,
                required: true,
            },
        },
        data: (v) => ({
            columnValue: v.currentValue || '',
        }),
        computed: {
            filter() {
                return this.$store.getters[`${this.resourceName}/getFilter`](this.filterKey);
            },
            value() {
                return this.filter.currentValue;
            },
        },
        methods: {
            handleChange(event) {
                this.$store.commit(`${this.resourceName}/updateFilterState`, {
                    filterClass: this.filterKey,
                    value: event.target.value,
                });

                this.$emit('change');
            },
        },
    }
</script>

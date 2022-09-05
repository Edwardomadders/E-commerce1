<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeCheckbox from '@/Components/Checkbox.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeInputError from '@/Components/InputError.vue';
import BreezeLabel from '@/Components/Label.vue';    
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import {ref} from 'vue';
let image=ref();
    const form = useForm({
    name: '',
    price: '',
    image: null,
    quantity: '',
    location: '',
    rate: '',
    istrending: '',
    remember: false
});

const submit = () => {
    form.image=image.value.files[0],
    form.post(route('product.post'), {
        onFinish: () => form.reset('name'),
    });}
    </script>
    
    <template>
        <Head title="CreateProduct" />
    
        <BreezeAuthenticatedLayout>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Dashboard
                </h2>
            </template>
    
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form @submit.prevent="submit">
            <div>
                <BreezeLabel for="name" value="name" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                <BreezeInputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="price" value="price" />
                <BreezeInput id="price" type="text" class="mt-1 block w-full" v-model="form.price" required autocomplete="current-price" />
                <BreezeInputError class="mt-2" :message="form.errors.price" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="image" value="image" />
                <Input id="image" type="file" class="mt-1 block w-full"  ref="image" autocomplete="current-image" />
                <BreezeInputError class="mt-2" :message="form.errors.image" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="quantity" value="quantity" />
                <BreezeInput id="quantity" type="text" class="mt-1 block w-full" v-model="form.quantity" required autocomplete="current-quantity" />
                <BreezeInputError class="mt-2" :message="form.errors.quantity" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="location" value="location" />
                <BreezeInput id="location" type="text" class="mt-1 block w-full" v-model="form.location" required autocomplete="current-location" />
                <BreezeInputError class="mt-2" :message="form.errors.location" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="rate" value="rate" />
                <BreezeInput id="rate" type="text" class="mt-1 block w-full" v-model="form.rate" required autocomplete="current-rate" />
                <BreezeInputError class="mt-2" :message="form.errors.rate" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="istrending" value="istrending" />
                <BreezeInput id="istrending" type="tetx" class="mt-1 block w-full" v-model="form.istrending" required autocomplete="current-istrending" />
                <BreezeInputError class="mt-2" :message="form.errors.istrending" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <BreezeCheckbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Forgot your password?
                </Link>

                <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Post
                </BreezeButton>
            </div>
        </form>
                        </div>
                    </div>
                </div>
            </div>
        </BreezeAuthenticatedLayout>
    </template>
    
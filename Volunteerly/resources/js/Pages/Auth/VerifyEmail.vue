<script setup>
import { computed } from "vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    status: {
        type: String,
    },
});

const form = useForm({});

const submit = () => {
    form.post(route("verification.send"));
};

const verificationLinkSent = computed(
    () => props.status === "verification-link-sent"
);
</script>

<template>
    <GuestLayout>
        <Head title="Potvrzení e-mailu" />

        <div class="mb-4 text-sm text-gray-600">
            Děkujeme za přihlášení! Než začnete, můžete ověřit svou e-mailovou
            adresu kliknutím na odkaz právě jsme vám poslali e-mail? Pokud jste
            email neobdrželi, rádi Vám zašleme další.
        </div>

        <div
            class="mb-4 font-medium text-sm text-green-600"
            v-if="verificationLinkSent"
        >
            Na e-mailovou adresu, kterou jste uvedli při registraci, byl odeslán
            nový ověřovací odkaz.
        </div>

        <form @submit.prevent="submit">
            <div class="mt-4 flex items-center justify-between">
                <PrimaryButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Opětovné zaslání ověřovacího e-mailu
                </PrimaryButton>

                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >Odhlásit se</Link
                >
            </div>
        </form>
    </GuestLayout>
</template>

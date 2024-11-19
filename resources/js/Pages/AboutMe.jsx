import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function AboutMe({ user }) {
    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    About Me
                </h2>
            }
        >
            <Head title="About Me" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            <div className="flex items-center space-x-4">
                                <img
                                    src={user.profile_image || '/images/default-avatar.png'} // Default avatar if profile image is missing
                                    alt="Profile"
                                    className="h-16 w-16 rounded-full"
                                />
                                <div>
                                    <h3 className="text-lg font-semibold">{user.full_name}</h3>
                                    <p className="text-sm text-gray-600">{user.email}</p>
                                    <p className="text-sm text-gray-600">
                                        {user.phone ? `Phone: ${user.phone}` : 'Phone number not provided'}
                                    </p>
                                    <p className="text-sm text-gray-600">
                                        {user.email_verified_at ? 'Email Verified' : 'Email Not Verified'}
                                    </p>
                                    <p className="text-sm text-gray-600">
                                        Account created on: {new Date(user.created_at).toLocaleDateString()}
                                    </p>
                                    <p className="text-sm text-gray-600">
                                        Last updated on: {new Date(user.updated_at).toLocaleDateString()}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}

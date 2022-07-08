@extends('layouts.backend.app')

@section('title', 'Users')

@push('css')
@endpush


@section('content')
    <div class="my-2">
        <div class="py-2 align-middle px-4">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="divide-y divide-gray-200 min-w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        <?php
                    foreach ($accounts as $account) {
                    ?>

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900"> <?php echo $account['username']; ?> </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900"> <?php echo $account['email']; ?> </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-capitalize text-sm text-gray-500">
                                <?php echo $account['name']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end">
                                <a href="index.php?edit_account=<?php echo $account['id']; ?>"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="inc/controller/account_controller.php">
                                    <input type="hidden" name="account_id" value="<?php echo $account['id']; ?>">
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-2"
                                        onclick="return confirm('Are you sure?');">Delete</a>
                                </form>
                            </td>
                        </tr>

                        <?php }

                    ?>

                        <!-- More people... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@push('js')
@endpush

<?php 
    include "session.php";
    $script_filename =  explode('/',$_SERVER['SCRIPT_FILENAME']);
    $curr_path = $script_filename[count($script_filename)-1];
    $pageName = '';
    
    if($curr_path == 'dashboard' || $curr_path == 'dashboard.php'){
      $pageName = 'Dashboard';
    }
    elseif($curr_path == 'customer-master' || $curr_path == 'customer-master.php'){
      $pageName = 'Customer Master';
    }
    elseif($curr_path == 'driver-master' || $curr_path == 'driver-master.php'){
      $pageName = "Driver Master";
    }
    elseif($curr_path == 'ride-master' || $curr_path == 'ride-master.php'){
      $pageName = "Ride Master";
    }
    elseif($curr_path == 'add-driver' || $curr_path == 'add-driver.php'){
      $pageName = "Add Driver";
    }
    elseif($curr_path == 'coupon-master' || $curr_path == 'coupon-master.php'){
      $pageName = "Coupon Master";
    }
    elseif($curr_path == 'add-coupon' || $curr_path == 'add-coupon.php'){
      $pageName = "Add Coupon";
    }
    elseif($curr_path == 'settings' || $curr_path == 'settings.php'){
      $pageName = "Settings";
    }
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Book your Own - Admin</title>
        <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="./assets/css/index.min.css" />
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.6/dist/flowbite.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.17/tailwind.min.css" />
    </head>
    <body>
        <div class="flex h-screen overflow-hidden bg-white">
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
                <div class="flex flex-col flex-grow pt-5 overflow-y-auto border-r" style="background-color:rgb(38, 38, 38);">
                    <div class="flex flex-col items-center flex-shrink-0 px-4">
                        <a href="./index.html" class="px-8 text-left focus:outline-none">
                            <h2 class="block p-2 text-xl font-medium tracking-tighter text-white transition duration-500 ease-in-out transform cursor-pointer hover:text-white">Welcome Admin</h2>
                        </a>
                        <button class="hidden rounded-lg focus:outline-none focus:shadow-outline">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                <path
                                    fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                    ></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-col flex-grow px-4 mt-5">
                        <nav class="flex-1 space-y-1" style="background-color:rgb(38, 38, 38);">
                            <ul>
                                <li>
                                    <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-base text-white transition duration-500 ease-in-out transform  <?php echo $pageName == "Dashboard" ?  'bg-indigo-600' : 'border-indigo-800';?>  rounded-lg focus:shadow-outline hover:bg-indigo-600" white="" 70="" href="dashboard.php">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                                                ></path>
                                        </svg>
                                        <span class="ml-4"> Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="inline-flex items-center w-full px-4 py-2 mt-1 text-base text-white transition duration-500 ease-in-out transform  <?php echo $pageName == "Customer Master" ?  'bg-indigo-600' : 'border-indigo-800';?>  rounded-lg hover:border-indigo-800 focus:shadow-outline hover:bg-indigo-600"
                                        href="customer-master.php"
                                        >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
                                                ></path>
                                        </svg>
                                        <span class="ml-4">Customer Master</span>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="inline-flex items-center w-full px-4 py-2 mt-1 text-base text-white transition duration-500 ease-in-out transform  <?php echo $pageName == "Driver Master" ?  'bg-indigo-600' : 'border-indigo-800';?>  rounded-lg hover:border-indigo-800 focus:shadow-outline hover:bg-indigo-600"
                                        href="driver-master.php"
                                        >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span class="ml-4">Driver Master</span>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="inline-flex items-center w-full px-4 py-2 mt-1 text-base text-white transition duration-500 ease-in-out transform  <?php echo $pageName == "Ride Master" ?  'bg-indigo-600' : 'border-indigo-800';?>  rounded-lg hover:border-indigo-800 focus:shadow-outline hover:bg-indigo-600"
                                        href="ride-master.php"
                                        >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span class="ml-4">Ride Master</span>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="inline-flex items-center w-full px-4 py-2 mt-1 text-base text-white transition duration-500 ease-in-out transform  <?php echo $pageName == "Coupon Master" ?  'bg-indigo-600' : 'border-indigo-800';?>  rounded-lg hover:border-indigo-800 focus:shadow-outline hover:bg-indigo-600"
                                        href="coupon-master.php"
                                        >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span class="ml-4">Coupon Master</span>
                                    </a>
                                </li>
                                <!-- <li>
                                    <a
                                        class="inline-flex items-center w-full px-4 py-2 mt-1 text-base text-white transition duration-500 ease-in-out transform  <?php echo $pageName == "Settings" ?  'bg-indigo-600' : 'border-indigo-800';?>  rounded-lg hover:border-indigo-800 focus:shadow-outline hover:bg-indigo-600"
                                        href="settings.php"
                                        >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                                                ></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span class="ml-4">Settings</span>
                                    </a>
                                </li> -->

                                <li class="align-bottom">
                                    <a
                                        class="inline-flex items-center w-full px-4 py-2 mt-1 text-base text-white transition duration-500 ease-in-out transform rounded-lg hover:border-indigo-800 focus:shadow-outline hover:bg-indigo-600"
                                        href="logout.php"
                                        >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span class="ml-4">Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="flex flex-shrink-0 p-4 px-4" style="background-color: rgb(23, 23, 23);">
                        <a href="#" class="flex-shrink-0 block w-full group">
                            <div class="flex items-center">
                                <div>
                                    <img class="inline-block rounded-full h-9 w-9" src="./assets/images/favicon.png" alt="" />
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-white">Book your Own</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col flex-1 w-0 overflow-hidden">
        <main class="relative flex-1 overflow-y-auto focus:outline-none">
        <nav class="flex py-3 px-5 text-gray-700 bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="dashboard.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Dashboard
                    </a>
                </li>

                <?php if($pageName != "Dashboard"){?>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500"><?php echo $pageName;?></span>
                        </div>
                    </li>
                <?php } ?>
            </ol>
        </nav>
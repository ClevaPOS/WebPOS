<?php
    /**
     * Created by PhpStorm.
     * User: thelinhuk
     * Date: 03/01/2016
     * Time: 23:25
     */

    namespace POSBundle\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Symfony\Component\HttpFoundation\Response;
    use POSBundle\Entity\Item;
    use POSBundle\Entity\Categories;
    use POSBundle\Form\CategoryForm;




    class POSAdminController extends Controller
    {
        function manageItemAction(Request $request)
        {

            $category = new Categories();
            $form = $this->createForm(CategoryForm::class,$category);

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                return $this->redirectToRoute('admin/items');

            }

                //$this->deleteCategory();
            $categories = $this->getCategoryList();
            //$this->deleteCategory($categories);
            return $this->render('POSBundle:Default:admin.html.twig',
                    array(  'categories' => $categories,
                            'form' => $form->createView()
                    )
                );

        }


        /**
         * Get categories
         *
         * @return array category
         */
        function getCategoryList()
        {
            $category = $this->getDoctrine()
                ->getRepository('POSBundle:Categories')
                ->findAll();
            dump($category);
            if (!$category) {
                throw $this->createNotFoundException(
                    'No Cateogry is avaiable '
                );
            } else {
                return $category;
            }



        }

        /**
         *
         */
        function deleteCategory($categories)
        {
            $item = '';

            $em = $this->getDoctrine()->getManager();

            if (!$categories)
            {
                throw $this->createNotFoundException(
                    'No Cateogry is availabe for deletion'
                );

            } else {
                foreach ($categories as $category )
                {
                    $em = $this->getDoctrine()->getManager();
                    $item = $em->getRepository('POSBundle:Categories')->find($category->getId());
                    dump($item);
                    dump($category->getId());
                    $em->remove($item);
                    $em->flush();
                }
            }


        }


    }


?>
<?php
    /**
     * Created by PhpStorm.
     * User: thelinhuk
     * Date: 03/01/2016
     * Time: 23:25
     */

    namespace POSBundle\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Request;
    use POSBundle\Entity\CategoryList;
    use POSBundle\Form\CategoryListType;
    use POSBundle\Form\CategoryType;

    use POSBundle\Entity\Category;





    class POSAdminController extends Controller
    {
        function manageItemAction(Request $request)
        {

            // Build the form
            // Handle the submit - POST
            $category = new Category();
            $form_add_category = $this->createForm(CategoryType::class,$category);

            $categoryOne = new Category();
            $categoryOne->setName('my');
            $categoryList = new CategoryList();
            $categoryList->getCategories()->add($categoryOne);
            $form = $this->createForm(CategoryListType::class ,$categoryList);

            $form->handleRequest($request);




            if ($form->isSubmitted() && $form->isValid()) {

            }

            return $this->render('POSBundle:Default:admin.html.twig',
                    array('form' => $form->createView())
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
                ->getRepository('POSBundle:Category')
                ->findAll();
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
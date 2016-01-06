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


    class POSAdminController extends Controller
    {
        function manageItemAction()
        {

            //$this->deleteCategory();
            $categories = $this->getCategoryList();
            //$this->deleteCategory($categories);
            return $this->render('POSBundle:Default:index.html.twig',
                    array('categories' => $categories)
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
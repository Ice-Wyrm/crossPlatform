<?php


namespace App\Controller;


use App\DTO\FactoryDto;
use App\MainService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    private MainService $mainService;
    public function __construct(MainService $mainService)
    {
        $this->mainService = $mainService;
    }

    /**
     * @Route("/ownerList")
     */
    public function ownerList()
    {
        return new JsonResponse($this->mainService->ownerList());
    }

    /**
     * @Route("/factoriesOfOwner/{ownerId}")
     * @param int $ownerId
     * @return JsonResponse
     */
    public function companiesOfOwner(int $ownerId)
    {
        return new JsonResponse($this->mainService->factoriesOfOwners($ownerId));
    }

    /**
     * @Route("/ownersOfFactory/{factoryId}")
     * @param int $factoryId
     * @return JsonResponse
     */
    public function ownersOfFactory(int $factoryId)
    {
        return new JsonResponse($this->mainService->ownersOfFactory($factoryId));
    }

    /**
     * @Route("/tankersOfFactory/{factoryId}")
     * @param int $factoryId
     * @return JsonResponse
     */
    public function tankersOfFactory(int $factoryId)
    {
        return new JsonResponse($this->mainService->tankersOfFactory($factoryId));
    }

    /**
     * @Route("/factory", methods={"POST"})
     * @param Request $request
     * @param int $ownerId
     * @return JsonResponse
     * @throws \Exception
     */
    public function addFactory(Request $request)
    {
        $factoryInfo = json_decode($request->get('factory'));
        $owners = $request->get('owners');
        $factoryDto = new FactoryDto();
        $factoryDto->name = $factoryInfo->name;
        $factoryDto->countryId = $factoryInfo->countryId;
        return new JsonResponse($this->mainService->addFactory($factoryDto, $owners));
    }
}